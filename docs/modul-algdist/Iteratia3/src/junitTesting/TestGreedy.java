package junitTesting;

import Algoritmi.CreateInput;
import Algoritmi.Greedy;
import DateBd.ComisieLicenta;
import DateBd.Profesor;
import DateBd.Student;
import org.junit.Test;

import static java.lang.Math.abs;
import static org.junit.Assert.*;

import java.util.ArrayList;
import static sun.swing.MenuItemLayoutHelper.max;

public class TestGreedy {

    CreateInput start=new CreateInput();
    public ArrayList<Profesor> listaProfi = start.creeazaListaProfesori(40);
    public ArrayList<ComisieLicenta> listaComisii = start.creeazaListaComisiiV2(listaProfi, 6);
    public ArrayList<Student> listaStudent = start.creeazaListaStudentV2(300, 30, listaProfi);
    private int i;
    private ArrayList<ComisieLicenta> testListaComisii0;
    private ArrayList<ComisieLicenta> testListaComisii;

    private static int afisareRezultat(String algoritm, ArrayList<ComisieLicenta> listaComisii) {
        int maxdif = Integer.MIN_VALUE;
        for (ComisieLicenta comisieLicenta1 : listaComisii)
            for (ComisieLicenta comisieLicenta2 : listaComisii)
                if (comisieLicenta1 != comisieLicenta2) {
                    maxdif = max(maxdif, abs(comisieLicenta1.getNrStudenti() - comisieLicenta2.getNrStudenti()));
                }

        //for (ComisieLicenta c : listaComisii)
        //    System.out.println("Comisia cu id - ul: " + c.getIdComisie() + " are " + c.getNrStudenti() + " studenti;");

        System.out.println("Diferenta maxima dintre licente cu alg " + algoritm + " este : " + maxdif);

        return maxdif;
    }

    @Test
    public void testGreedy() {
        for (Student student : listaStudent)
            student.setIdComisie(-1);
        for (ComisieLicenta comisieLicenta : listaComisii) {
            comisieLicenta.setNrStudenti(0);
            comisieLicenta.setListaStudenti(new ArrayList<>());
        }


        Greedy test0 = new Greedy(listaStudent, listaProfi, listaComisii);
        Greedy test = new Greedy(listaStudent, listaProfi, listaComisii);


        test0.smarterGreedyPartition();
        test.smarterGreedyPartition();
        testListaComisii0 = test0.getComisii();
        testListaComisii = test.getComisii();
        i = 0;
        for (ComisieLicenta comisie : testListaComisii0
        ) {
            assertEquals(testListaComisii.get(i), comisie);
            i++;
        }



        test0.adaugaStudentiDejaRepartizati();
        test.adaugaStudentiDejaRepartizati();
        testListaComisii0 = test0.getComisii();
        testListaComisii = test.getComisii();
        i = 0;
        for (ComisieLicenta comisie : testListaComisii0
        ) {
            assertEquals(testListaComisii.get(i), comisie);
            i++;
        }




        test0.adaugaStudentiNerepartizati();
        test.adaugaStudentiNerepartizati();
        testListaComisii0 = test0.getComisii();
        testListaComisii = test.getComisii();
        i = 0;
        for (ComisieLicenta comisie : testListaComisii0
        ) {
            assertEquals(testListaComisii.get(i), comisie);
            i++;
        }


        assertEquals(test0.getIndexMinSum(test0.getGrupeRepartizareNrStudenti()) , test.getIndexMinSum(test.getGrupeRepartizareNrStudenti()));

        assertEquals(test0.apartineComisie(test0.getProfesori().get(0)) , test.apartineComisie(test.getProfesori().get(0)));

        assertEquals(afisareRezultat("Greedy", test0.getComisii()), afisareRezultat("Greedy", test.getComisii()));

    }


}
