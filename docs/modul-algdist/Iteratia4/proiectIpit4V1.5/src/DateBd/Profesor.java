package DateBd;

/**
 * The class Professor contains the profesor's id,
 * the assigned commission id, and the number of students
 * assigned to this profesor.
 */
public class Profesor {

    /**
     * The id of the professor
     */
    private int id;

    /**
     * The id of the commission
     */
    private int idComisie;

    /**
     * The id of the president professor
     */
    private int nrStudenti = -1;

    /**
     * This constructor sets the id, commissionId and the number of students of a profesor.
     * @param id sets the profesor's id
     * @param idComisie sets the commission id
     * @param nrStudenti sets the number of students
     */
    public Profesor(int id, int idComisie, int nrStudenti) {
        this.id = id;
        this.idComisie = idComisie;
        this.nrStudenti = nrStudenti;
    }

    /**
     * This constructor is here for when we don't want to set the ids
     */
    public Profesor() {}

    /**
     * Gets the id of the Profesor
     * @return the id of the Professor
     */
    public int getId() {
        return id;
    }

    /**
     * Sets the id of the Profesor
     * @param id the id of the Profesor
     */
    public void setId(int id) {
        this.id = id;
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
     * Gets the number of students assigned to this Profesor
     * @return the number of students
     */
    public int getNrStudenti() {
        return nrStudenti;
    }

    /**
     * Sets the number of students assigned to this Profesor
     * @param nrStudenti the number of students
     */
    public void setNrStudenti(int nrStudenti) {
        this.nrStudenti = nrStudenti;
    }
}
