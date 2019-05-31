package DateBd;

public class ComisieDisertatie extends Comisie {
    public static int nrProfesori = 4;
    public static int nrSecretari = 1;
    public ComisieDisertatie(int profId) {
        super(profId);
        this.getListaIdProfesori().add(new Profesor());
        this.getListaIdProfesori().add(new Profesor());
        this.getListaIdProfesori().add(new Profesor());
        this.getListaIdProfesori().add(new Profesor());
    }
}
