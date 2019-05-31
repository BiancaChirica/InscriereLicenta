package CreatorComisie;

import DateBd.Profesor;

public class ProfesorNumarStudenti implements Comparable<ProfesorNumarStudenti> {
	int idProfesor;
	int nrStudenti;

	ProfesorNumarStudenti(Profesor profesor) {
		this.idProfesor = profesor.getId();
		this.nrStudenti = profesor.getNrStudenti();
	}

	public int getId() {
		return idProfesor;
	}

	public void setIdProfesor(int id) {
		this.idProfesor = id;
	}

	public int getNrStudenti() {
		return nrStudenti;
	}

	public void setNrStudenti(int nrStudenti) {
		this.nrStudenti = nrStudenti;
	}

	@Override
	public int compareTo(ProfesorNumarStudenti o) {
		if (this.nrStudenti > o.getNrStudenti())
			return 1;
		else if (this.nrStudenti < o.getNrStudenti())
			return -1;
		else
			return 0;
	}

}
