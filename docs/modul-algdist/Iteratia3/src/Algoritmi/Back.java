package Algoritmi;

import DateBd.ComisieLicenta;
import DateBd.Profesor;
import DateBd.Student;

import java.util.ArrayList;

/**
 * This class allocates professors to comissions
 * And students to commissions based of their professor
 * Using a backtraching aproach
 */
public class Back {

    /**
     * The list of the commissions
     */
    private final ArrayList<ComisieLicenta> listaComisii; //SE ADAUGA STUDENTII LA COMISII

    /**
     * The list of the professors
     */
    private final ArrayList<Profesor> listaProfesoriCuElevi;

    /**
     * The list of the commissions
     */
    private final ArrayList<Student> listaStudenti; //ASTA SE VA MODIFICA

    /**
     * The list of the professor's commissions
     */
    private int[] comisiaProfesorului;

    /**
     * The final list of the professor's commissions
     */
    private int[] comisiaFinalaAProfesorului;

    /**
     * The minimum difference(used in back())
     */
    private int diferentaMinima;

    /**
     * The number of the students in a commission
     */
    private int[] nrActualStudentiComisii;

    /**
     * A boolean array that stores if a professor is in a commission or not
     */
    private boolean[] inComisie;

    /**
     * The number of professors
     */
    private int nrProfesori;

    /**
     * The number of commissions
     */
    private int nrComisii;

    /**
     * A boolean value that starts/terminates the backtracking algorithm
     */
    private boolean running;

    /**
     * The number of seconds until the running is set to be false
     */
    private final long nrSecunde;

    /**
     * This constructor sets the list of students, the list of professors with students,
     * The list of commissions, and the running time in seconds
     *
     * @param listaStudenti the list of students
     * @param listaProfesori the list of professors
     * @param listaComisii the list of commissions
     * @param nrSecunde the number of seconds until the algorithm terminates
     */
    public Back(ArrayList<Student> listaStudenti, ArrayList<Profesor> listaProfesori,  ArrayList<ComisieLicenta> listaComisii, long nrSecunde) {
        this.listaStudenti = listaStudenti;
        this.listaComisii = listaComisii;
        this.listaProfesoriCuElevi = new ArrayList<>();
        for (Profesor profesor : listaProfesori)
            if (profesor.getNrStudenti() != 0)
                this.listaProfesoriCuElevi.add(profesor);
        nrProfesori = listaProfesoriCuElevi.size();
        comisiaProfesorului = new int[nrProfesori + 5];
        comisiaFinalaAProfesorului = new int[nrProfesori + 5];
        inComisie = new boolean[nrProfesori + 5];
        nrComisii = listaComisii.size();
        nrActualStudentiComisii = new int[nrProfesori + 5];
        diferentaMinima = Integer.MAX_VALUE;
        running = true;
        this.nrSecunde = nrSecunde;
    }

    /**
     * This method allocates the students to the professors that are already in a commission
     * By calling the adaugaLaComisiiStudentiiCuProfesoriInEle()
     * Then, the stopwatch of the back algorithm is started in a thread by making a new Cronometru object.
     * After the rest of the professors are allocated by calling the back() method,
     * The rest of the students are too allocated to their commissions
     */
    public void startAlg() {
        adaugaLaComisiiStudentiiCuProfesoriInEle();

        Cronometru cronometru = new Cronometru(this, nrSecunde * 1000);
        Thread t = new Thread(cronometru);
        t.start();
        back(1);

        for (Student student : listaStudenti) {
            int i = 1;
            for (Profesor profesor : listaProfesoriCuElevi) {
                if (student.getIdProf() == profesor.getId()) {
                    student.setIdComisie(comisiaFinalaAProfesorului[i]);
                    for (ComisieLicenta comisieLicenta : listaComisii)
                        if (comisieLicenta.getIdComisie() == student.getIdComisie())
                            comisieLicenta.addStudent(student);
                    break;
                }
                i++;
            }
        }
    }

    public long getNrSecunde() {
        return nrSecunde;
    }

    /**
     * This method allocates the professors to commissions by using a backtracking aproach
     * @param k the k-th professor
     */
    public void back(int k) {
        if (!running) return;

        if (k == nrProfesori + 1) {
            if (diferentaMinima > getDifMaxima()) {
                for (int i1 = 1; i1 <= nrProfesori; i1++)
                    comisiaFinalaAProfesorului[i1] = comisiaProfesorului[i1];
                diferentaMinima = getDifMaxima();
            }
            return;
        }
        if (!inComisie[k])
            for (int comisie = 1; comisie <= nrComisii; comisie++) {
                comisiaProfesorului[k] = listaComisii.get(comisie - 1).getIdComisie();
                nrActualStudentiComisii[comisie] += listaProfesoriCuElevi.get(k - 1).getNrStudenti();

                if (nrActualStudentiComisii[comisie] <= (int)((listaStudenti.size()  / nrComisii) * 2.5))
                    back(k + 1);
                nrActualStudentiComisii[comisie] -= listaProfesoriCuElevi.get(k - 1).getNrStudenti();
                comisiaProfesorului[k] = 0;
            }
        else back(k + 1);
    }

    /**
     * This method calculates the maximum difference between
     * The number of students from two different commisions
     * @return the maximum difference
     */
    public int getDifMaxima() {
        int rezultat = -1;
        for (int i = 1; i <= nrComisii; i++)
            for (int i1 = 1; i1 <= nrComisii; i1++)
                if (i != i1)
                    rezultat = Math.max(rezultat, Math.abs(nrActualStudentiComisii[i] - nrActualStudentiComisii[i1]));
        return rezultat;
    }

    public ArrayList<ComisieLicenta> getListaComisii() {
        return listaComisii;
    }

    /**
     * This method finds every professor's commission if they are in one
     * After that, it adds the students in their professor's commission
     * And stores the number of students per commission in nrActualStudentiComisii
     */
    public void adaugaLaComisiiStudentiiCuProfesoriInEle() {
        for (ComisieLicenta comisieLicenta : listaComisii) {
            int i = 1;
            for (Profesor profesor : listaProfesoriCuElevi) {
                if (profesor.getId() == comisieLicenta.getIdProfPresedinte() ||
                        profesor.getId() == comisieLicenta.getIdProf2() ||
                        profesor.getId() == comisieLicenta.getIdProf3()) {
                    inComisie[i] = true;
                    comisiaProfesorului[i] = comisieLicenta.getIdComisie();
                }
                i++;
            }
        }

        int i = 1;
        for (ComisieLicenta comisieLicenta : listaComisii) {
            for (Student student : listaStudenti)
                if (student.getIdProf() == comisieLicenta.getIdProfPresedinte() || student.getIdProf() == comisieLicenta.getIdProf2()
                        || student.getIdProf() == comisieLicenta.getIdProf3())
                    nrActualStudentiComisii[i]++;
            i++;
        }
    }

    /**
     * this method starts the running of the backtracking algorithm
     * @param running is the boolean value that starts/terminates the algorithm
     */
    public void setRunning(boolean running) {
        this.running = running;
    }

}
