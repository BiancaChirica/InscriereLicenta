package DateBd;

import org.junit.jupiter.api.Test;

import static org.junit.jupiter.api.Assertions.*;

class ProfesorTest {


    @Test
    void getParola() throws Exception{

        Profesor profesor1 = new Profesor();
        profesor1.setNrStudenti(5);
        profesor1.setIdComisie(1);
        profesor1.setNume("FirstName");
        profesor1.setPrenume("SecondName");
        profesor1.setRol("Rol");
        profesor1.setGradDidactic("grad");
        profesor1.setParola("testing");
        assertEquals("testing",profesor1.getParola());
    }
}