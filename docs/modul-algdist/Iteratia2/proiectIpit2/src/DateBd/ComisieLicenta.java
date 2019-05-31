package DateBd;

import java.util.ArrayList;

public class ComisieLicenta {
    int idProfPresedinte;
    int idProf2;
    int idProf3;
    int idProfSecretar;
    int idComisie;
    ArrayList<ProgramareLicenta> listaProgramari;
    String sala;
	public ComisieLicenta(int idProfPresedinte, int idProf2, int idProf3, int idProfSecretar) {
		this.idProfPresedinte = idProfPresedinte;
		this.idProf2 = idProf2;
		this.idProf3 = idProf3;
		this.idProfSecretar = idProfSecretar;
		this.listaProgramari = new ArrayList<>();
	}

    public int getIdProfPresedinte() {
        return idProfPresedinte;
    }

    public void setIdProfPresedinte(int idProfPresedinte) {
        this.idProfPresedinte = idProfPresedinte;
    }

    public int getIdProf2() {
        return idProf2;
    }

    public void setIdProf2(int idProf2) {
        this.idProf2 = idProf2;
    }

    public int getIdProf3() {
        return idProf3;
    }

    public void setIdProf3(int idProf3) {
        this.idProf3 = idProf3;
    }

    public int getIdProfSecretar() {
        return idProfSecretar;
    }

    public void setIdProfSecretar(int idProfSecretar) {
        this.idProfSecretar = idProfSecretar;
    }

    public int getIdComisie() {
        return idComisie;
    }

    public void setIdComisie(int idComisie) {
        this.idComisie = idComisie;
    }

    public ArrayList<ProgramareLicenta> getListaProgramari() {
        return listaProgramari;
    }

    public void setListaProgramari(ArrayList<ProgramareLicenta> listaProgramari) {
        this.listaProgramari = listaProgramari;
    }

    public String getSala() {
        return sala;
    }

    public void setSala(String sala) {
        this.sala = sala;
    }
}
