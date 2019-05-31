package DateBd;

import org.junit.jupiter.api.Test;

import static org.junit.jupiter.api.Assertions.*;

class ComisieLicentaTest {


    @Test
    void getIdComisie() {
        ComisieLicenta comisie = new ComisieLicenta(1,2,3,4);
        assertEquals(1,comisie.getIdProfPresedinte());
    }
}