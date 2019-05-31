package junitTesting;

import DatabaseConnection.Controller;
import DateBd.Comisie;
import DateBd.Profesor;
import DateBd.Student;
import org.junit.Test;

import java.sql.SQLException;
import java.util.ArrayList;

import static org.junit.Assert.assertEquals;

public class TestController {

    private Controller test0;
    private Controller test;
    private ArrayList<Student> listaStudent0;
    private ArrayList<Profesor> listaProfi0;
    private ArrayList<Comisie> listaComisii0;
    private ArrayList<Student> listaStudent;
    private ArrayList<Profesor> listaProfi;
    private ArrayList<Comisie> listaComisii;
    private int i=0;

    @Test
    public void testController(){
        try {
            test = new Controller();
            test0 = new Controller();
            test.readLicenta();
            test0.readLicenta();
            listaStudent = test.getListaStudenti();
            listaStudent0 = test0.getListaStudenti();
            for (Student student : listaStudent
            ) {
                assertEquals(student, listaStudent0.get(i));
                i++;
            }
            i = 0;
            for (Profesor profesor : listaProfi
            ) {
                assertEquals(profesor, listaProfi0.get(i));
                i++;
            }
            i = 0;
            for (Comisie comisie : listaComisii
            ) {
                assertEquals(comisie, listaComisii0.get(i));
                i++;
            }

        } catch (SQLException e) {
            e.printStackTrace();
        }
    }
}