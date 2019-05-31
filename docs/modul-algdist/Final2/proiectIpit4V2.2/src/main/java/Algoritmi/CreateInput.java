package Algoritmi;

import DateBd.Comisie;
import DateBd.ComisieLicenta;
import DateBd.Profesor;
import DateBd.Student;

import java.util.ArrayList;
import java.util.Collections;
import java.util.Random;

/**
 * This class creates the input used for testing
 */
public class CreateInput {

    public static ArrayList<Student> creeazaListaStudent(int numarStudenti, ArrayList<Profesor> listaProfi) {
        ArrayList<Student> listaStudent = new ArrayList<>();
        int idStudent=0;
        int numarStudentiAssignati=0;
        int assignam;
        int numarProfiRamasi= listaProfi.size();
        Random rand = new Random();

        for(int i=1;i<=numarStudenti;i++) {
            Student s = new Student();
            s.setId(i);
            listaStudent.add(s);
        }

        Collections.shuffle(listaStudent);

        Collections.shuffle(listaProfi);
        for(Profesor p : listaProfi) {
            if(p.getNrStudenti()==-1){
                numarProfiRamasi--;
                assignam = rand.nextInt(20) + 1;
                if(numarProfiRamasi>numarStudenti-numarStudentiAssignati-assignam) assignam=numarStudenti-numarStudentiAssignati-numarProfiRamasi;
                p.setNrStudenti(assignam);
                for(int i=numarStudentiAssignati;i<=numarStudentiAssignati+assignam-1;i++)
                    listaStudent.get(i).setIdProf(p.getId());
                numarStudentiAssignati += assignam;
            }
        }
        return listaStudent;
    }

    public static ArrayList<Comisie> creeazaListaComisii(ArrayList<Profesor> listaProfi) {
        ArrayList<Comisie> listaComisii = new ArrayList<>();
        ArrayList<Integer> listaIDProfesoriComisie = new ArrayList<>();
        int num = 1;
        int idComisie = 0;
        Collections.shuffle(listaProfi);

        for(Profesor p : listaProfi) {
            if (num >= 1 && num <= 4) {
                p.setIdComisie(idComisie);
                listaIDProfesoriComisie.add(p.getId());
            }
            if (num == 4) {
                //al 4-lea prof e secretar si nu are studenti
                p.setNrStudenti(0);
                //creeaza comisie

                ComisieLicenta c = new ComisieLicenta(idComisie);
                c.setNextProf(listaIDProfesoriComisie.get(0));
                c.setNextProf(listaIDProfesoriComisie.get(1));
                c.setNextProf(listaIDProfesoriComisie.get(2));
                listaComisii.add(c);
                idComisie++;
                //reseteaza count-ul
                num = 0;
                listaIDProfesoriComisie = new ArrayList<>();
            }
            num++;
        }
        if(num!=1) throw new IllegalArgumentException("Profesorii nu pot fi impartiti corect in comisii: Numarul profesorilor trebuie sa fie multiplu de 4!");
        return listaComisii;
    }


    public static ArrayList<Profesor> creeazaListaProfesori(int number) {
        ArrayList<Profesor> listaProfi = new ArrayList<>();
        for(int i =1;i<=number;i++) {
            Profesor p = new Profesor();
            p.setId(i);
            listaProfi.add(p);
        }
        return listaProfi;
    }

    public static ArrayList<Student> creeazaListaStudentV2(int numarStudenti, int nrMaxStudentiPerProf, ArrayList<Profesor> listaProfi) {
        ArrayList<Student> listaStudent = new ArrayList<>();
        int idStudent=1;
        Random rand = new Random();

        for(int i = 1; i <= numarStudenti; i++) {
            Student s = new Student();
            s.setId(i);
            listaStudent.add(s);
            if (i <= listaProfi.size()) {
                s.setIdProf(listaProfi.get(i - 1).getId());
                listaProfi.get(i - 1).setNrStudenti(1);
            }
            else {
                int nrProf = rand.nextInt(listaProfi.size());
                while (listaProfi.get(nrProf).getNrStudenti() > (nrMaxStudentiPerProf))
                    nrProf = rand.nextInt(listaProfi.size());
                s.setIdProf(listaProfi.get(nrProf).getId());
                listaProfi.get(nrProf).setNrStudenti(listaProfi.get(nrProf).getNrStudenti() + 1);
            }
        }
        return listaStudent;
    }

    public static ArrayList<Comisie> creeazaListaComisiiV2(ArrayList<Profesor> listaProfi, int nrComisii) {
        ArrayList<Comisie> listaComisii = new ArrayList<>();
        ArrayList<Integer> listaIDProfesoriComisie = new ArrayList<>();
        int num = 1;
        int idComisie = 1;
        Collections.shuffle(listaProfi);

        for(Profesor p : listaProfi) {
            if (num >= 1 && num <= 2) {
                p.setIdComisie(idComisie);
                listaIDProfesoriComisie.add(p.getId());
            }
            if (num == 3) {
                p.setIdComisie(idComisie);
                listaIDProfesoriComisie.add(p.getId());
                //creeaza comisie

                ComisieLicenta c = new ComisieLicenta(idComisie);
                c.setNextProf(listaIDProfesoriComisie.get(0));
                c.setNextProf(listaIDProfesoriComisie.get(1));
                c.setNextProf(listaIDProfesoriComisie.get(2));

                listaComisii.add(c);
                idComisie++;
                //reseteaza count-ul
                num = 0;
                listaIDProfesoriComisie = new ArrayList<>();
            }
            num++;
            if (listaComisii.size() == nrComisii) break;
        }
        return listaComisii;
    }


}
