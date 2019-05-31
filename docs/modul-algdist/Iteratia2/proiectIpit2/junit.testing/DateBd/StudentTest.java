package DateBd;

import org.junit.jupiter.api.Test;

import java.util.Date;

import static org.junit.jupiter.api.Assertions.*;

class StudentTest {


    @Test
    void getRepository() {

        Student student = new Student();
        student.setDataNastere(new Date());
        student.setEmail("emailtest");
        student.setId(1);
        student.setIdComisie(1);
        student.setIdProf(1);
        student.setNrMatricol(21312);
        student.setParola("parola");
        student.setNume("FirstName");
        student.setPrenume("SecondName");
        student.setRepository("link");
        assertEquals("link",student.getRepository());
        assertEquals(21312,student.getNrMatricol());
    }
}