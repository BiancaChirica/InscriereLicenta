package DateBd;

import java.util.ArrayList;

/**
 * This class is the commission itself.
 * It contains the ids of the professors,
 * the id of the commission, the list of assigned students,
 * and the number of assigned students.
 */
public class ComisieLicenta {

    /**
     * The id of the president professor
     */
    private int idProfPresedinte;

    /**
     * The id of the second professor
     */
    private int idProf2;

    /**
     * The id of the third professor
     */
    private int idProf3;

    /**
     * The id of the secretar professor
     */
    private int idProfSecretar;

    /**
     * The id of the commission
     */
    private int idComisie;

    /**
     * The list of the students assigned to this commission
     */
    private ArrayList<Student> listaStudenti;

    /**
     * The number of the students assigned to this commission
     */
    private int nrStudenti;

    /**
     * This constructor sets the id of the commission
     * @param id the if of the commission
     */
    public ComisieLicenta(int id) {
        idComisie = id;
    }

    /**
     * This constructor sets the professor's ids.
     * @param idProfPresedinte the id of the president professor
     * @param idProf2 the id of the second professor
     * @param idProf3 the id of the third professor
     * @param idProfSecretar the id of the secretar professor (this one doesn't have students assigned)
     */
	public ComisieLicenta(int idProfPresedinte, int idProf2, int idProf3, int idProfSecretar) {
		this.idProfPresedinte = idProfPresedinte;
		this.idProf2 = idProf2;
		this.idProf3 = idProf3;
		this.idProfSecretar = idProfSecretar;
		this.listaStudenti = new ArrayList<>();
	}

    /**
     * Gets the id of the president professor
     * @return the id of the president professor
     */
    public int getIdProfPresedinte() {
        return idProfPresedinte;
    }

    /**
     * Sets the id of the president professor
     * @param idProfPresedinte the id of the president professor
     */
    public void setIdProfPresedinte(int idProfPresedinte) {
        this.idProfPresedinte = idProfPresedinte;
    }

    /**
     * Gets the id of the second professor
     * @return the id of the second professor
     */
    public int getIdProf2() {
        return idProf2;
    }

    /**
     * Sets the id of the second professor
     * @param idProf2 the id of the second professor
     */
    public void setIdProf2(int idProf2) {
        this.idProf2 = idProf2;
    }

    /**
     * Gets the id of the third professor (master)
     * @return the id of the third professor
     */
    public int getIdProf3() {
        return idProf3;
    }

    /**
     * Sets the id of the third professor
     * @param idProf3 the id of the third professor
     */
    public void setIdProf3(int idProf3) {
        this.idProf3 = idProf3;
    }

    /**
     * Gets the id of the secretar professor
     * @return the id of the secretar professor
     */
    public int getIdProfSecretar() {
        return idProfSecretar;
    }

    /**
     * Sets the id of the secretar professor
     * @param idProfSecretar the id of the secretar professor
     */
    public void setIdProfSecretar(int idProfSecretar) {
        this.idProfSecretar = idProfSecretar;
    }

    /**
     * Gets the id of the commission
     * @return the id of the commission
     */
    public int getIdComisie() {
        return idComisie;
    }

    /**
     * Sets the id of the commission
     * @param idComisie the id of the commission
     */
    public void setIdComisie(int idComisie) {
        this.idComisie = idComisie;
    }

    /**
     * Gets the list of the students
     * @return the list of the students
     */
    public ArrayList<Student> getListaStudenti() {
        return listaStudenti;
    }

    /**
     * Sets the list of the students
     * @param listaStudenti the list of the students
     */
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

    /**
     * Sets the Id of the second or third proffessor
     * If the comission doesn't have one assigned
     * @param idProf the id of the proffessor
     */
    public void setIdProf(int idProf) {
        if(idProf2 == 0)
            idProf2 = idProf;
        else idProf3 = idProf;
    }

}
