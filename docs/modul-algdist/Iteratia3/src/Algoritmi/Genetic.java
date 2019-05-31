package Algoritmi;

import DateBd.ComisieLicenta;
import DateBd.Profesor;
import DateBd.Student;

import javax.swing.text.html.StyleSheet;
import java.util.ArrayList;
import java.util.Random;

import static java.lang.Math.abs;
import static sun.swing.MenuItemLayoutHelper.max;

public class Genetic {

    /**
     * The list of the commissions
     */
    private final ArrayList<ComisieLicenta> listaComisii; //SE ADAUGA STUDENTII LA COMISII

    /**
     * The list of the professors that have students assigned
     */
    private final ArrayList<Profesor> listaProfesoriCuElevi;

    /**
     * The list of the students
     */
    private final ArrayList<Student> listaStudenti; //ASTA SE VA MODIFICA

    /**
     * A int representing the index + 1 from the array listaComisii
     * or 0 if the professor is not assigned to any of the commission
     */
    private int[] inComisie;

    /**
     * The number of the professors that Have students
     */
    private int nrProfesori;

    /**
     * The numbers of the commissions
     */
    private int nrComisii;

    /**
     * a global random value generator
     */
    private static final Random rand = new Random();

    /**
     * The parameters for the genetic algorithm :
     * mutation probability(0 < value < 1)
     * cross prob (0 < value < 1)
     */
    private double mutationProbability, crossProbability;

    /**
     * The final result that contains the value that represents the maximum difference
     * between the nr of students of any 2 commissions
     */
    private int rezultatGlobal;

    /**
     * Other parameters for genetic;
     */
    private int nrOfGenerations, popSize;

    /**
     * Vectors of vectors containing popSize elements
     * and each element represents
     */
    private int[][] cromozomi, cromozomiUrmatori;

    /**
     *
     */
    private int[] alocareRezultatFinal;

    /**
     * The number of students in a commission
     */
    private int[] nrEleviComisie;

    /**
     * This constructor sets the list of students, the list of professors with students,
     * The list of commissions and then, it calls the seteazaConstante() method
     *
     * @param listaStudenti the list of students
     * @param listaProfesori the list of professors
     * @param listaComisii the list of commissions
     */
    public Genetic(ArrayList<Student> listaStudenti, ArrayList<Profesor> listaProfesori,  ArrayList<ComisieLicenta> listaComisii) {
        this.listaStudenti = listaStudenti;
        this.listaComisii = listaComisii;
        this.listaProfesoriCuElevi = new ArrayList<>();
        for (Profesor profesor : listaProfesori)
            if (profesor.getNrStudenti() != 0)
                this.listaProfesoriCuElevi.add(profesor);
        nrProfesori = listaProfesoriCuElevi.size();
        inComisie = new int[nrProfesori + 5];
        for (int i = 1; i <= nrProfesori; i++)
            inComisie[i] = -1;
        nrComisii = listaComisii.size();

        seteazaConstante();
    }

    /**
     * This methods sets the constant values for the genetic algorithm
     */
    private void seteazaConstante() {
        mutationProbability = 0.2;
        crossProbability = 0.5;
        nrOfGenerations = 5000;
        popSize = 100;
        rezultatGlobal = Integer.MAX_VALUE;

        cromozomi = new int[popSize + 5][nrProfesori + 5];
        cromozomiUrmatori = new int[popSize + 5][nrProfesori + 5];
        nrEleviComisie = new int[nrComisii + 5];

        alocareRezultatFinal = new int[nrProfesori + 5];
    }

    /**
     *
     *
     */
    private void adaugaLaComisiiStudentiiCuProfesoriInEle() {
        int nrComisie = 1;
        for (ComisieLicenta comisieLicenta : listaComisii) {
            int i = 1;
            for (Profesor profesor : listaProfesoriCuElevi) {
                if (profesor.getId() == comisieLicenta.getIdProfPresedinte() ||
                        profesor.getId() == comisieLicenta.getIdProf2() ||
                        profesor.getId() == comisieLicenta.getIdProf3()) {
                    inComisie[i] = nrComisie;
                }
                i++;
            }
            if (inComisie[i] == -1)
                inComisie[i] = -1;
            nrComisie++;
        }
    }

    /**
     *
     *
     */
    public void startAlg() {
        adaugaLaComisiiStudentiiCuProfesoriInEle();
        geneticAlg();

        for (Student student : listaStudenti) {
            int i = 1;
            for (Profesor profesor : listaProfesoriCuElevi) {
                if (student.getIdProf() == profesor.getId()) {
                    student.setIdComisie(alocareRezultatFinal[i]);
                    for (ComisieLicenta comisieLicenta : listaComisii)
                        if (comisieLicenta.getIdComisie() == student.getIdComisie())
                            comisieLicenta.addStudent(student);
                    break;
                }
                i++;
            }
        }

    }

    /**
     *
     *
     */
    void newRandomChromosomes() {
        for (int i = 1; i <= popSize; i++)
            for (int i1 = 1; i1 <= nrProfesori; i1++)
                if (inComisie[i1] == -1)
                    cromozomi[i][i1] = rand.nextInt(nrComisii) + 1;
                else cromozomi[i][i1] = inComisie[i1];
    }

    int functieDiferentaMaxima(int individNr) {
        int res = -1;

        for (int i = 1; i <= nrComisii; i++)
            nrEleviComisie[i] = 0;

        for (int i = 1; i <= nrProfesori; i++)
            nrEleviComisie[cromozomi[individNr][i]] += listaProfesoriCuElevi.get(i - 1).getNrStudenti();

        for (int i = 1; i < nrComisii; i++)
            for (int i1 = 1; i1 <= nrComisii; i1++)
                res = Math.max(res, Math.abs(nrEleviComisie[i] - nrEleviComisie[i1]));
        return res;
    }

    /**
     *
     *
     * @return
     */
    boolean selecteazaGeneratieNouaRoata() {
        boolean minUpdate = false;
        double sumaFitness = 0;
        double[] fitness = new double[popSize + 5];
        double[] probCumulata = new double[popSize + 5];

        for (int i = 1; i <= popSize; i++) {
            fitness[i] = functieDiferentaMaxima(i);
            int valoareReala = (int) (fitness[i]);
            if (valoareReala < rezultatGlobal) {
                for (int i1 = 1; i1 <= nrProfesori; i1++)
                    alocareRezultatFinal[i1] = listaComisii.get(cromozomi[i][i1] - 1).getIdComisie();
                minUpdate = true;
                rezultatGlobal = valoareReala;
                functieDiferentaMaxima(i);
            }
        }

        for (int i = 1; i <= popSize; i++) {

            fitness[i] = 1 / (fitness[i] + 2);
            sumaFitness += fitness[i];
        }
        for (int i = 1; i <= popSize; i++) {
            double prob = fitness[i];
            prob /= sumaFitness;
            prob += probCumulata[i - 1];
            if (prob > 1)
                prob = 1;
            probCumulata[i] = prob;
        }
        probCumulata[popSize] = 1;
        for (int i = 1; i <= popSize; i++) {
            double prob = rand.nextDouble();
            int poz = 0;
            for (int i1 = 0; i1 <= popSize; i1++)
                if (prob < probCumulata[i1 + 1]) {
                    poz = i1; break;
                }
            if (poz == 0) poz = 1;
            for (int i1 = 1; i1 <= nrProfesori; i1++)
                cromozomiUrmatori[i][i1] = cromozomi[poz][i1];
        }
        for (int i = 1; i <= popSize; i++)
            for (int i1 = 1; i1 <= nrProfesori; i1++)
                cromozomi[i][i1] = cromozomiUrmatori[i][i1];
        return minUpdate;
    }

    /**
     *
     *
     */
    void crossOver() {
        int[] crossIndivizi = new int[popSize + 5];
        int next = 0;
        double[] prob = new double[popSize + 5];
        double probUrmatoare = 1;
        for (int i = 1; i <= popSize; i++)
            prob[i] = rand.nextDouble();
        for (int i = 1; i <= popSize; i++)
            if (prob[i] < crossProbability)
                crossIndivizi[++crossIndivizi[0]] = i;
            else if (probUrmatoare > prob[i]) {
                probUrmatoare = prob[i];
                next = i;
            }
        if (crossIndivizi[0] % 2 == 1) {
            boolean pick = rand.nextBoolean();
            if (!pick)
                crossIndivizi[0]--;
            else
                crossIndivizi[++crossIndivizi[0]] = next;
        }

        for (int i = 1; i <= crossIndivizi[0]; i += 2) {
            int a, b;
            a = crossIndivizi[i];
            b = crossIndivizi[i + 1];
            int pos = rand.nextInt(nrProfesori - 1) + 2;
            for (int i1 = pos; i1 <= nrProfesori; i1++) {
                int aux = cromozomi[b][i1];
                cromozomi[b][i1] = cromozomi[a][i1];
                cromozomi[a][i1] = aux;
            }
        }
    }

    /**
     *
     *
     */
    void mutate() {
        double p;
        for (int i = 1; i <= popSize; i++)
            for (int i1 = 1; i1 <= nrProfesori; i1++) {
                p = rand.nextDouble();
                if (p < mutationProbability && inComisie[i1] == -1) {
                    cromozomi[i][i1] = rand.nextInt(nrComisii) + 1;
                }
            }
    }

    /**
     *
     *
     */
    void geneticAlg() {
        int ultimaGeneratieImbunatatire = 0, nrGenActuala = 1;
        newRandomChromosomes();
        for(; nrGenActuala <= nrOfGenerations; nrGenActuala++) {
            mutate();
            crossOver();
            if (selecteazaGeneratieNouaRoata()) {
                ultimaGeneratieImbunatatire = nrGenActuala;
                System.out.println("Gen of improve is in : " + ultimaGeneratieImbunatatire + " si minimul e : " + rezultatGlobal);
            }
        }
    }
}

