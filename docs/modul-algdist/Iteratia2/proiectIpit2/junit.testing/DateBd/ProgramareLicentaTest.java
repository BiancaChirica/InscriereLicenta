package DateBd;

import org.junit.jupiter.api.Test;

import java.time.LocalDate;
import java.time.LocalTime;
import java.util.Date;

import static org.junit.jupiter.api.Assertions.*;

class ProgramareLicentaTest {

    @Test
    void getData() {
        ProgramareLicenta program = new ProgramareLicenta(1, LocalTime.now(),LocalDate.now());
        assertEquals(LocalDate.of(2019,4,22),program.getData());
    }
}