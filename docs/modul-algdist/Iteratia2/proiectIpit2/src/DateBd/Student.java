package DateBd;

import java.util.Date;

public class Student {
    int id;
    int idProf;
    int idComisie;
    int nrMatricol;
    String parola;
    String nume;
    String prenume;
    Date dataNastere;
    String repository;
    String email;

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public int getIdProf() {
        return idProf;
    }

    public void setIdProf(int idProf) {
        this.idProf = idProf;
    }

    public int getIdComisie() {
        return idComisie;
    }

    public void setIdComisie(int idComisie) {
        this.idComisie = idComisie;
    }

    public int getNrMatricol() {
        return nrMatricol;
    }

    public void setNrMatricol(int nrMatricol) {
        this.nrMatricol = nrMatricol;
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

    public Date getDataNastere() {
        return dataNastere;
    }

    public void setDataNastere(Date dataNastere) {
        this.dataNastere = dataNastere;
    }

    public String getRepository() {
        return repository;
    }

    public void setRepository(String repository) {
        this.repository = repository;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }
}
