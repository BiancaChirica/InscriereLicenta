package CreatorComisie;

import DateBd.ComisieLicenta;
import DateBd.Profesor;
import DateBd.ProgramareLicenta;
import DateBd.Student;

import java.time.LocalDate;
import java.time.LocalTime;
import java.util.ArrayList;
import java.util.Collections;
import java.util.Date;
import java.util.List;

public class CreatorComisiiLicenta {
	ArrayList<Student> studenti;
	ArrayList<Profesor> profesori;
	ArrayList<Profesor> profesoriCuStudenti;
	ArrayList<Profesor> profesoriSecretari;
	ArrayList<ProfesorNumarStudenti> listaNrStudenti;

	List<ComisieLicenta> comisiiLicenta;

	public CreatorComisiiLicenta(ArrayList<Student> studenti, ArrayList<Profesor> profesori) {
		this.comisiiLicenta = new ArrayList<ComisieLicenta>();
		this.profesori = profesori;
		this.studenti = studenti;
		profesoriCuStudenti = new ArrayList<>();
		profesoriSecretari = new ArrayList<>();
		listaNrStudenti = new ArrayList<>();

		for (Profesor profesor : profesori)
			if (profesor.getNrStudenti() != 0) {
				profesoriCuStudenti.add(profesor);
				listaNrStudenti.add(new ProfesorNumarStudenti(profesor));
			} else
				profesoriSecretari.add(profesor);
	}

	public void createComitees() {
		Collections.sort(listaNrStudenti);
		int stanga = 0;
		int dreapta = listaNrStudenti.size() - 1;
		int secretar = 0;
		while (stanga < dreapta - 1 && secretar < profesoriSecretari.size()) {
			comisiiLicenta
					.add(new ComisieLicenta(listaNrStudenti.get(stanga).getId(),
							listaNrStudenti.get(stanga + 1).getId(),
							listaNrStudenti.get(dreapta).getId(),
							profesoriSecretari.get(secretar).getId()));

			stanga += 2;
			dreapta -= 1;
			secretar += 1;
		}
		if (stanga == dreapta - 1) {
			comisiiLicenta
					.add(new ComisieLicenta(listaNrStudenti.get(stanga).getId(),
							listaNrStudenti.get(stanga + 1).getId(),
							profesoriSecretari.get(secretar).getId(),
							profesoriSecretari.get(secretar + 1).getId()));
		} else if (stanga == dreapta) {
			comisiiLicenta
					.add(new ComisieLicenta(listaNrStudenti.get(stanga).getId(),
							profesoriSecretari.get(secretar).getId(),
							profesoriSecretari.get(secretar + 1).getId(),
							profesoriSecretari.get(secretar + 2).getId()));
		}
	}

	public void alocareTimpStudenti(){
		LocalTime ora = LocalTime.of(10,0,0,0);;
		LocalDate data = LocalDate.of(2019,6,20);
		long timpAlocatStudent = 30;
		LocalTime oraDeschidereSala = LocalTime.of(10,0,0,0);
		LocalTime oraInchidereSala = LocalTime.of(16,0,0,0);
		for(ComisieLicenta c:comisiiLicenta)
		{
			for(Student s:studenti)
			{
				if(c.getIdProfPresedinte() == s.getIdProf() ||
						c.getIdProf2() == s.getIdProf() ||
						c.getIdProf3() == s.getIdProf())
				{
					s.setIdComisie(c.getIdComisie());
					if(ora.isBefore(oraInchidereSala)) {
						c.getListaProgramari().add(new ProgramareLicenta(s.getId(), ora, data));
						ora = ora.plusMinutes(timpAlocatStudent);
					}
					else
					{
						data = data.plusDays(1);
						ora = oraDeschidereSala;
						c.getListaProgramari().add(new ProgramareLicenta(s.getId(), ora, data));
						ora = ora.plusMinutes(timpAlocatStudent);
					}
				}
			}
		}
	}

	public List<ComisieLicenta> getComisiiLicenta() {
		return comisiiLicenta;
	}

}