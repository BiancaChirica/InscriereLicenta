package CreatorComisie;

import DateBd.Profesor;
import DateBd.Student;
import org.junit.jupiter.api.Test;

import java.util.ArrayList;

import static org.junit.jupiter.api.Assertions.*;

class CreatorComisiiLicentaTest {

    @Test
    void getComisiiLicenta() {

        ArrayList<Student> studenti = new ArrayList<>();
        ArrayList<Profesor> profesori = new ArrayList<>();
        Student s1 = new Student();
        Student s2 = new Student();
        s1.setId(1);
        s1.setIdProf(1);
        s2.setId(2);
        s2.setIdProf(2);
        Profesor p1 = new Profesor();
        Profesor p2 = new Profesor();
        Profesor p3 = new Profesor();
        Profesor p4 = new Profesor();
        p1.setId(1);
        p1.setNrStudenti(1);
        p2.setId(2);
        p3.setId(3);
        p4.setId(4);
        studenti.add(s1);
        studenti.add(s2);
        profesori.add(p1);
        profesori.add(p2);
        profesori.add(p3);
        profesori.add(p4);
        CreatorComisiiLicenta c = new CreatorComisiiLicenta(studenti, profesori);
        c.createComitees();
        c.alocareTimpStudenti();

        System.out.println(c.getComisiiLicenta());
    }
}