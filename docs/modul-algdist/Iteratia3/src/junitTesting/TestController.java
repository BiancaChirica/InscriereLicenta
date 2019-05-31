package junitTesting;

import DatabaseConnection.Controller;
import DateBd.ComisieLicenta;
import DateBd.Profesor;
import DateBd.Student;

import org.junit.Test;
import static org.junit.Assert.*;

import java.sql.SQLException;
import java.util.ArrayList;

public class TestController {


    private Controller test0 = new Controller();
    private Controller test = new Controller();
    private ArrayList<Student> listaStudent0;
    private ArrayList<Profesor> listaProfi0;
    private ArrayList<ComisieLicenta> listaComisii0;
    private ArrayList<Student> listaStudent;
    private ArrayList<Profesor> listaProfi;
    private ArrayList<ComisieLicenta> listaComisii;
    private int i=0;

    @Test
    public void testController(){
        try {
            test0.readStudent();
            test.readStudent();
            listaStudent0 = test0.getListaStudent();
            listaStudent = test.getListaStudent();

            test0.readProfi();
            test.readProfi();
            listaProfi0 = test0.getListaProfi();
            listaProfi = test.getListaProfi();

            test0.readComisii();
            test.readComisii();
            listaComisii0 = test0.getListaComisii();
            listaComisii = test.getListaComisii();

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
            for (ComisieLicenta comisie : listaComisii
            ) {
                assertEquals(comisie, listaComisii0.get(i));
                i++;
            }

        } catch (SQLException e) {
            e.printStackTrace();
        }
    }
}