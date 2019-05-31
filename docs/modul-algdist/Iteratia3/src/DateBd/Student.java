package DateBd;

/**
 * This class Student contains the id of the student,
 * the id of the assigned professor for license,
 * and the id of the assigned commission.
 */
public class Student {

    /**
     * The id of the student
     */
    private int id;

    /**
     * The id of the professor
     */
    private int idProf;

    /**
     * The id of the commission
     */
    private int idComisie;

    /**
     * An empty constructor
     */
    public Student() {}

    /**
     * This constructor sets the id of the student and
     * The id of the proffessor where the student is assigned
     * @param newId the id of the student
     * @param newIdProf the id of the proffessor
     */
    public Student(int newId, int newIdProf) {
        id = newId;
        idProf = newIdProf;
    }

    /**
     * Gets the id of the student
     * @return the id of the student
     */
    public int getId() {
        return id;
    }

    /**
     * Sets the id of the student
     * @param id the id of the student
     */
    public void setId(int id) {
        this.id = id;
    }

    /**
     * Gets the id of the profesor
     * @return the id of the profesor
     */
    public int getIdProf() {
        return idProf;
    }

    /**
     * Sets the id of the profesor
     * @param idProf the id of the assigned profesor
     */
    public void setIdProf(int idProf) {
        this.idProf = idProf;
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
}
