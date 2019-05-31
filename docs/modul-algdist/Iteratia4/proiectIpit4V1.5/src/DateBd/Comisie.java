package DateBd;


import java.util.ArrayList;

/**
 * This class is the commission itself.
 * It contains the ids of the professors,
 * the id of the commission, the list of assigned students,
 * and the number of assigned students.
 */

public abstract class Comisie {
    private int idComisie;
    private ArrayList<Profesor> listaIdProfesori;
    private ArrayList<Profesor> listaIdSecretari;
    private ArrayList<Student> listaStudenti;
    private int nrStudenti;

    public Comisie(int idComisie) {
        this.idComisie = idComisie;
        this.listaIdSecretari = new ArrayList<>();
        this.listaIdProfesori = new ArrayList<>();
        this.listaStudenti = new ArrayList<>();
    }

    public int getIdComisie() {
        return idComisie;
    }

    public void setIdComisie(int idComisie) {
        this.idComisie = idComisie;
    }

    public ArrayList<Student> getListaStudenti() {
        return listaStudenti;
    }

    public ArrayList<Profesor> getListaIdProfesori() {
        return listaIdProfesori;
    }

    public void setListaIdProfesori(ArrayList<Profesor> listaIdProfesori) {
        this.listaIdProfesori = listaIdProfesori;
    }

    public ArrayList<Profesor> getListaIdSecretari() {
        return listaIdSecretari;
    }

    public void setListaIdSecretari(ArrayList<Profesor> listaIdSecretari) {
        this.listaIdSecretari = listaIdSecretari;
    }

    public void setListaStudenti(ArrayList<Student> listaStudenti) {
        this.listaStudenti = listaStudenti;
    }

    /**
     * Gets the number of students assigned to this commission
     * @return the number of the students
     */
    public int getNrStudenti() {
        return nrStudenti;
    }

    /**
     * Sets the number of students that are assigned to this commission
     * @param nrStudenti the number of students
     */
    public void setNrStudenti(int nrStudenti) {
        this.nrStudenti = nrStudenti;
    }

    /**
     * Adds a student to this commission
     * @param student the object of the student that will be assigned
     */
    public void addStudent(Student student) {
        listaStudenti.add(student);
        nrStudenti++;
    }

    public boolean inComisie(int idProf) {
        for (Profesor profesor : listaIdProfesori)
            if (idProf == profesor.getId())
                return true;
        return false;
    }

    public void setNextProf(int idProf) {
        for (Profesor profesor : listaIdProfesori)
            if (profesor.getId() == 0) {
                profesor.setId(idProf);
                return;
            }
    }

    public void setNextSecretar(int idProf) {
        for (Profesor profesor : listaIdSecretari)
            if (profesor.getId() == 0) {
                profesor.setId(idProf);
                return;
            }
    }

}
