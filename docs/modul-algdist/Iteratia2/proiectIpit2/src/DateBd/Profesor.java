package DateBd;

public class Profesor {

    int id;
    int idComisie;
    int nrStudenti;
    String parola;
    String nume;
    String prenume;
    String gradDidactic;
    String rol;
    String email;
/*
    public Profesor(int id, int idComisie, int nrStudenti, String parola, String nume, String prenume, String gradDidactic, String rol, String email) {
        this.id = id;
        this.idComisie = idComisie;
        this.nrStudenti = nrStudenti;
        this.parola = parola;
        this.nume = nume;
        this.prenume = prenume;
        this.gradDidactic = gradDidactic;
        this.rol = rol;
        this.email = email;
    }
*/
    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public int getIdComisie() {
        return idComisie;
    }

    public void setIdComisie(int idComisie) {
        this.idComisie = idComisie;
    }

    public int getNrStudenti() {
        return nrStudenti;
    }

    public void setNrStudenti(int nrStudenti) {
        this.nrStudenti = nrStudenti;
    }

    public String getParola() {
        return parola;
    }

    public void setParola(String parola) {
        this.parola = parola;
    }

    public String getNume() {
        return nume;
    }

    public void setNume(String nume) {
        this.nume = nume;
    }

    public String getPrenume() {
        return prenume;
    }

    public void setPrenume(String prenume) {
        this.prenume = prenume;
    }

    public String getGradDidactic() {
        return gradDidactic;
    }

    public void setGradDidactic(String gradDidactic) {
        this.gradDidactic = gradDidactic;
    }

    public String getRol() {
        return rol;
    }

    public void setRol(String rol) {
        this.rol = rol;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }
}
