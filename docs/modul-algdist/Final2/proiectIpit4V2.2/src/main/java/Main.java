import DateBd.Comisie;
import DateBd.Profesor;
import DateBd.Student;

import java.util.ArrayList;

import static java.lang.Math.abs;
import static sun.swing.MenuItemLayoutHelper.max;

@SuppressWarnings("ALL")
public class Main {
    public static void main(String[] args) {
        ArrayList<Student> s = new ArrayList<>();
        s.add(new Student());
        s.get(0).setId(1);
        s.get(0).setIdProf(1);
        s.get(0).setIdComisie(2);
        return;/*
        CreateInput start=new CreateInput();
        double medieBack = 0;
        double medieGenetic = 0;
        double medieGreedy = 0;
        for(int i=1;i<=100;i++) {

            ArrayList<Profesor> listaProfi = start.creeazaListaProfesori(40);
            ArrayList<Comisie> listaComisii = start.creeazaListaComisiiV2(listaProfi, 6);
            ArrayList<Student> listaStudent = start.creeazaListaStudentV2(300, 30, listaProfi);
            Controller controller = new Controller();
            try {controller.readProfi();}
            catch (Exception e) {};
            //afisareListaProfi(listaProfi);
            //afisareListaComisii(listaComisii);
            //afisareListaStudent(listaStudent);

            listaProfi = (ArrayList<Profesor>) listaProfi.clone();
            listaComisii = (ArrayList<Comisie>) listaComisii.clone();
            listaStudent = (ArrayList<Student>) listaStudent.clone();
            //new Back(listaStudent, listaProfi, listaComisii, 1).startAlg();
            medieBack+=afisareRezultat("Back",listaComisii);

            for (Student student : listaStudent)
                student.setIdComisie(-1);
            for (Comisie Comisie : listaComisii) {
                Comisie.setNrStudenti(0);
                Comisie.setListaStudenti(new ArrayList<>());
            }

            listaProfi = (ArrayList<Profesor>) listaProfi.clone();
            listaComisii = (ArrayList<Comisie>) listaComisii.clone();
            listaStudent = (ArrayList<Student>) listaStudent.clone();
            new Genetic(listaStudent, listaProfi, listaComisii).startAlg();
            medieGenetic+=afisareRezultat("Genetic",listaComisii);


            for (Student student : listaStudent)
                student.setIdComisie(-1);
            for (Comisie Comisie : listaComisii) {
                Comisie.setNrStudenti(0);
                Comisie.setListaStudenti(new ArrayList<>());
            }

            listaProfi = (ArrayList<Profesor>) listaProfi.clone();
            listaComisii = (ArrayList<Comisie>) listaComisii.clone();
            listaStudent = (ArrayList<Student>) listaStudent.clone();
            new Greedy(listaStudent, listaProfi, listaComisii).startSmart();
            medieGreedy+=afisareRezultat("Greedy", listaComisii);

            System.out.println();
        }
        System.out.println("Media alg Back e: " + medieBack/100);
        System.out.println("Media alg Genetic e: " + medieGenetic/100);
        System.out.println("Media alg Greedy e: " + medieGreedy/100);
        exit(0);*/
    }

    private static int afisareRezultat(String algoritm,ArrayList<Comisie> listaComisii) {
        int maxdif = Integer.MIN_VALUE;
        for (Comisie Comisie1 : listaComisii)
            for (Comisie Comisie2 : listaComisii)
                if (Comisie1 != Comisie2) {
                    maxdif = max(maxdif, abs(Comisie1.getNrStudenti() - Comisie2.getNrStudenti()));
                }

        //for (Comisie c : listaComisii)
        //    System.out.println("Comisia cu id - ul: " + c.getIdComisie() + " are " + c.getNrStudenti() + " studenti;");

        System.out.println("Diferenta maxima dintre licente cu alg " + algoritm + " este : " + maxdif);

        return maxdif;
    }

    private static void afisareListaStudent(ArrayList<Student> listaStudent) {
        System.out.println("Studenti:");
        System.out.format("%4s%1s%7s%1s","ID","|","ID Prof","\n");
        for(Student s : listaStudent) {
            System.out.format("%4s%1s%7s%1s",s.getId(),"|",s.getIdProf(),"\n");
        }
    }

    private static void afisareListaComisii(ArrayList<Comisie> listaComisii) {
        System.out.println("Comisii:");
        System.out.format("%4s%1s%8s%1s%8s%1s%8s%1s%8s%1s","ID","|","ID ProfP","|","ID Prof2","|","ID Prof3","|","ID ProfS","\n");
        for(Comisie c : listaComisii) {
            System.out.format("%4s%1s%8s%1s%8s%1s%8s%1s%8s%1s",c.getIdComisie(),"|",c.getListaIdProfesori().get(0)
                    ,"|",c.getListaIdProfesori().get(1),"|",c.getListaIdProfesori().get(2),"|","\n");
        }
    }

    private static void afisareListaProfi(ArrayList<Profesor> listaProfi) {
        System.out.println("Profesori:");
        System.out.format("%4s%1s%6s%1s%8s%1s","ID","|","ID Com","|","Num Stud","\n");
        for(Profesor p : listaProfi) {
            System.out.format("%4s%1s%6s%1s%8s%1s",p.getId(),"|",p.getIdComisie(),"|",p.getNrStudenti(),"\n");
        }
    }

/*
    private static ArrayList<Student> creeazaListaStudent(int numarStudenti, ArrayList<Profesor> listaProfi) {
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

    private static ArrayList<Comisie> creeazaListaComisii(ArrayList<Profesor> listaProfi) {
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

                Comisie c = new Comisie(listaIDProfesoriComisie.get(0), listaIDProfesoriComisie.get(1), listaIDProfesoriComisie.get(2), listaIDProfesoriComisie.get(3));
                c.setIdComisie(idComisie);
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

    private static ArrayList<Profesor> creeazaListaProfesori(int number) {
        ArrayList<Profesor> listaProfi = new ArrayList<>();
        for(int i =1;i<=number;i++) {
            Profesor p = new Profesor();
            p.setId(i);
            listaProfi.add(p);
        }
        return listaProfi;
    }

    private static ArrayList<Student> creeazaListaStudentV2(int numarStudenti, int nrMaxStudentiPerProf, ArrayList<Profesor> listaProfi) {
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

    private static ArrayList<Comisie> creeazaListaComisiiV2(ArrayList<Profesor> listaProfi, int nrComisii) {
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

                Comisie c = new Comisie(listaIDProfesoriComisie.get(0), listaIDProfesoriComisie.get(1), listaIDProfesoriComisie.get(2), listaIDProfesoriComisie.get(2));
                c.setIdComisie(idComisie);
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

*/
}
