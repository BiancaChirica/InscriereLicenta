package DateBd;

import java.time.LocalDate;
import java.time.LocalTime;
import java.util.Date;

public class ProgramareLicenta {
    int idStudent;
    LocalTime ora;
    LocalDate data;
    public ProgramareLicenta(int idStudent, LocalTime ora, LocalDate data)
    {
        this.idStudent = idStudent;
        this.ora = ora;
        this.data = data;
    }

    public int getIdStudent() {
        return idStudent;
    }

    public void setIdStudent(int idStudent) {
        this.idStudent = idStudent;
    }

    public LocalTime getOra() {
        return ora;
    }

    public void setOra(LocalTime ora) {
        this.ora = ora;
    }

    public LocalDate getData() {
        return data;
    }

    public void setData(LocalDate data) {
        this.data = data;
    }
}
