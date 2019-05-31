package CreatorComisie;

import DateBd.Profesor;
import org.junit.jupiter.api.Test;

import static org.junit.jupiter.api.Assertions.*;

class ProfesorNumarStudentiTest {

    @Test
    void getNrStudenti() {

        Profesor profesor1 = new Profesor();
        profesor1.setNrStudenti(5);
        profesor1.setIdComisie(1);
        profesor1.setNume("FirstName");
        profesor1.setPrenume("SecondName");
        profesor1.setRol("Rol");
        profesor1.setGradDidactic("grad");
        profesor1.setParola("testing");

        ProfesorNumarStudenti count = new ProfesorNumarStudenti(profesor1);
        assertEquals(5,count.getNrStudenti());

    }
}