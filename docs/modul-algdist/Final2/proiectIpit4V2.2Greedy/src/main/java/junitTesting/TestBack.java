package junitTesting;

import Algoritmi.Back;
import Algoritmi.CreateInput;
import Algoritmi.Cronometru;
import DateBd.Comisie;
import DateBd.Profesor;
import DateBd.Student;
import org.junit.Test;

import java.util.ArrayList;

import static org.junit.Assert.assertEquals;

public class TestBack {
    CreateInput start=new CreateInput();
    public ArrayList<Profesor> listaProfi = start.creeazaListaProfesori(40);
    public ArrayList<Comisie> listaComisii = start.creeazaListaComisiiV2(listaProfi, 6);
    public ArrayList<Student> listaStudent = start.creeazaListaStudentV2(300, 30, listaProfi);
    private int i;
    private ArrayList<Comisie> testListaComisii0;
    private ArrayList<Comisie> testListaComisii;


    @Test
    public void testBack(){
        Back test0=new Back(listaStudent, listaProfi, listaComisii, 1);
        Back test=new Back(listaStudent, listaProfi, listaComisii, 1);


        test0.adaugaLaComisiiStudentiiCuProfesoriInEle();
        test.adaugaLaComisiiStudentiiCuProfesoriInEle();
        testListaComisii0 = test0.getListaComisii();
        testListaComisii = test.getListaComisii();
        i = 0;
        for (Comisie comisie : testListaComisii0
        ) {
            assertEquals(testListaComisii.get(i), comisie);
            i++;
        }

        Cronometru cronometru0 = new Cronometru(test0, test0.getNrSecunde() * 1000);
        Thread t0 = new Thread(cronometru0);
        t0.start();
        test0.back(1);


        Cronometru cronometru = new Cronometru(test, test.getNrSecunde() * 1000);
        Thread t = new Thread(cronometru);
        t.start();
        test.back(1);


        testListaComisii0 = test0.getListaComisii();
        testListaComisii = test.getListaComisii();
        i = 0;
        for (Comisie comisie : testListaComisii0
        ) {
            assertEquals(testListaComisii.get(i), comisie);
            i++;
        }
    }

}
