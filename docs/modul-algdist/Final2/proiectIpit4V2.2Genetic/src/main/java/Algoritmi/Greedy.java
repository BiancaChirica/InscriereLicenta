package Algoritmi;

import java.util.ArrayList;
import DateBd.Comisie;
import DateBd.Profesor;
import DateBd.Student;

/**
 * This class can assign professors to comissions using
 * two greedy ways: a simple one and a smarter one
 * After, it assigns the students to their comissions.
 */
public class Greedy {

    /**
     * The list of the students
     */
    private ArrayList<Student> Studenti;

    /**
     * The list of the commissions
     */
    private ArrayList<Comisie> Comisii;

    /**
     * The list of the professors
     */
    private ArrayList<Profesor> Profesori;

    /**
     * The list of the professors that have students assigned
     */
    private ArrayList<Profesor> ProfesoriCuStudenti;

    /**
     * A List of groups where each group contains the number of assigned students for each professor
     */
    private ArrayList<ArrayList<Integer>> grupeRepartizareNrStudenti;

    /**
     * A List of groups where each group contains the ids of professors assigned to a comission
     */
    private ArrayList<ArrayList<Integer>> grupeRepartizareIdProfesori;

    /**
     * This constructor sets the list of students, the list of professors,
     * And the list of comissions
     *
     * @param Studenti the list of students
     * @param Profesori the list of professors
     * @param Comisii the list of comissions
     */
    public Greedy(ArrayList<Student> Studenti, ArrayList<Profesor> Profesori, ArrayList<Comisie> Comisii) {
        this.Studenti = Studenti;
        this.Comisii = Comisii;
        this.Profesori = Profesori;

        ProfesoriCuStudenti = new ArrayList<Profesor>();
        for (int i = 0; i < this.Profesori.size(); i++)
            if (!apartineComisie(this.Profesori.get(i)))
                this.ProfesoriCuStudenti.add(Profesori.get(i));

        grupeRepartizareNrStudenti = new ArrayList<ArrayList<Integer>>();
        grupeRepartizareIdProfesori = new ArrayList<ArrayList<Integer>>();

        for(int i=0; i<Comisii.size(); i++)
        {
            grupeRepartizareNrStudenti.add(new ArrayList<Integer>());
            grupeRepartizareIdProfesori.add(new ArrayList<Integer>());
        }
    }

    /**
     * This method starts to assign professors to comissions in the simple way
     * By calling the getSimpleGreedyPartition() method
     * After, it assignes the students to their comissions, based on professors
     */
    public void startSimple()
    {
        this.getSimpleGreedyPartition();
        this.adaugaStudentiDejaRepartizati();
        this.adaugaStudentiNerepartizati();
    }

    /**
     * This method starts to assign professors to comissions in the smarter way,
     * By calling the smarterGreedyPartition() method
     * After, it assignes the students to their comissions, based on professors
     */
    public void startSmart()
    {
        this.smarterGreedyPartition();
        this.adaugaStudentiDejaRepartizati();
        this.adaugaStudentiNerepartizati();

    }

    /**
     * This method assigns the professors to comissions in the simple way
     * It firstly sorts the professors after their number of assigned students
     * After, it asigns in order one profesor to one comission increasing
     * When the number of comissions is hit, it starts over until each professor is assigned.
     */
    public void getSimpleGreedyPartition() {
        int[] vectorNrStudenti = new int[ProfesoriCuStudenti.size()];
        int[] vectorIdProfesori = new int[ProfesoriCuStudenti.size()];

        for (int i = 0; i < ProfesoriCuStudenti.size(); i++) {
            vectorNrStudenti[i] = ProfesoriCuStudenti.get(i).getNrStudenti();
            vectorIdProfesori[i] = ProfesoriCuStudenti.get(i).getId();
        }

        int swapVariable;

        /**
         * Bubble Sort
         */
        for (int i = 0; i < ProfesoriCuStudenti.size() - 1; i++)
            for (int j = i + 1; j < ProfesoriCuStudenti.size(); j++)
                if (vectorNrStudenti[i] > vectorNrStudenti[j]) {
                    swapVariable = vectorNrStudenti[i];
                    vectorNrStudenti[i] = vectorNrStudenti[j];
                    vectorNrStudenti[j] = swapVariable;

                    swapVariable = vectorIdProfesori[i];
                    vectorIdProfesori[i] = vectorIdProfesori[j];
                    vectorIdProfesori[j] = swapVariable;
                }

        int i = 0;
        int numarComisie = 0;
        while (i < ProfesoriCuStudenti.size()) {
            grupeRepartizareNrStudenti.get(numarComisie).add(vectorNrStudenti[i]);
            grupeRepartizareIdProfesori.get(numarComisie).add(vectorIdProfesori[i]);
            i++;
            if (numarComisie == Comisii.size() - 1)
                numarComisie = 0;
            else
                numarComisie++;
        }
    }

    /**
     * This method assigns the professors to comissions in the smarter way
     * It firstly sorts the professors after their number of assigned students
     * After, it asigns in order one profesor to one comission increasing
     * When the number of comissions is hit, it assigns the remained professors
     * To the comission with the minimum sum of students assigned such that each
     * Comission will have an average number of students assigned
     */
    public void smarterGreedyPartition() {
        int[] vectorNrStudenti = new int[ProfesoriCuStudenti.size()];
        int[] vectorIdProfesori = new int[ProfesoriCuStudenti.size()];

        for (int i = 0; i < ProfesoriCuStudenti.size(); i++) {
            vectorNrStudenti[i] = ProfesoriCuStudenti.get(i).getNrStudenti();
            vectorIdProfesori[i] = ProfesoriCuStudenti.get(i).getId();
        }

        int swapVariable;

        /**
         * Bubble sort
         */
        for (int i = 0; i < ProfesoriCuStudenti.size() - 1; i++)
            for (int j = i + 1; j < ProfesoriCuStudenti.size(); j++)
                if (vectorNrStudenti[i] > vectorNrStudenti[j]) {
                    swapVariable = vectorNrStudenti[i];
                    vectorNrStudenti[i] = vectorNrStudenti[j];
                    vectorNrStudenti[j] = swapVariable;

                    swapVariable = vectorIdProfesori[i];
                    vectorIdProfesori[i] = vectorIdProfesori[j];
                    vectorIdProfesori[j] = swapVariable;
                }

        int index = 0;

        while (index < Comisii.size() && index < ProfesoriCuStudenti.size()) {
            grupeRepartizareNrStudenti.get(index).add(vectorNrStudenti[index]);
            grupeRepartizareIdProfesori.get(index).add(vectorIdProfesori[index]);
            index++;
        }

        while (index < ProfesoriCuStudenti.size()) {
            int minSumIndex = getIndexMinSum(grupeRepartizareNrStudenti);
            grupeRepartizareNrStudenti.get(minSumIndex).add(vectorNrStudenti[index]);
            grupeRepartizareIdProfesori.get(minSumIndex).add(vectorIdProfesori[index]);
            index++;
        }
    }

    public int getIndexMinSum(ArrayList<ArrayList<Integer>> grupeRepartizareNrStudenti) {
        int MinSum = Integer.MAX_VALUE;
        int tempSum = 0;
        int MinSumIndex = 0;
        for (int i = 0; i < grupeRepartizareNrStudenti.size(); i++) {
            tempSum = 0;
            for (int j = 0; j < grupeRepartizareNrStudenti.get(i).size(); j++)
                tempSum = tempSum + grupeRepartizareNrStudenti.get(i).get(j);
            if (tempSum < MinSum) {
                MinSum = tempSum;
                MinSumIndex = i;
            }
        }

        return MinSumIndex;

    }
    /**
     * This function iterates through all the comissions
     * to see if the param Professor p is assigned
     * to any of them by checking the id.
     * <p>
     * If it does then the function returns true, else false.
     *
     * @param p of type Profesor
     * @return of type boolean
     */
    public boolean apartineComisie(Profesor p) {
        for (Comisie c : Comisii)
            if (c.inComisie(p.getId()))
                return true;
        return false;
    }

    /**
     * This function assigns the students to their comissions where their professor is assigned too
     * It checks if the professor assigned to the student exists in a comission:
     * if it's true then the student is assigned; if not, then the loop goes on.
     */
    public void adaugaStudentiDejaRepartizati() {
        for (Student s : Studenti)
            for (Comisie c : Comisii)
                if (c.inComisie(s.getIdProf())) {
                    c.addStudent(s);
                    s.setIdComisie(c.getIdComisie());
                }
    }

    /**
     * This function assigns the students to their profesors that weren't assigned to a comission yet
     */
    public void adaugaStudentiNerepartizati() {
        for (Student s : Studenti)
            for (int i = 0; i < Comisii.size(); i++)
                if (grupeRepartizareIdProfesori.get(i).contains(s.getIdProf())) {
                    Comisii.get(i).addStudent(s);
                    s.setIdComisie(Comisii.get(i).getIdComisie());
                }
    }
}
