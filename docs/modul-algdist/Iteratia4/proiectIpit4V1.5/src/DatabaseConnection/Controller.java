package DatabaseConnection;

import DateBd.Comisie;
import DateBd.ComisieLicenta;
import DateBd.Profesor;
import DateBd.Student;

import java.sql.*;
import java.util.ArrayList;

/**
 * This class is used to communicate with the DataBase
 * By reading and updating data
 */
public class Controller {

    /**
     * The list of the students
     */
    private ArrayList<Student> listaStudent;

    /**
     * The list of the professors
     */
    private ArrayList<Profesor> listaProfi;

    /**
     * The list of the commissions
     */
    private ArrayList<Comisie> listaComisii;

    /**
     *
     *
     * @throws SQLException
     */
    public void read() throws SQLException {
        readStudent();
        readProfi();
    }

    /**
     * This method connects to the DataBase and takes all the student's ids
     * With the professor of where they are assigned,
     * Storing everything in listaStudent
     * @throws SQLException if there are problems with the connection to the DataBase
     */
    public void readStudent() throws SQLException {
        listaStudent = new ArrayList<>();
        Connection con = DataBase.getConnection();
        try (Statement stmt = con.createStatement();
             ResultSet rs = stmt.executeQuery("select id,id_prof from studenti")) {
            while (rs.next()) {
                Student student = new Student(rs.getInt("id"), rs.getInt("id_prof"));
                listaStudent.add(student);
            }
        }
    }

    /**
     * This method connects to the DataBase and takes all the professor's ids,
     * The commission id of where they are assigned, and the number of students
     * That are assigned to them, storing everything in listaProfi
     * @throws SQLException if there are problems with the connection to the DataBase
     */
    public void readProfi() throws SQLException {
        listaProfi = new ArrayList<>();
        Connection con = DataBase.getConnection();
        try (Statement stmt = con.createStatement();
             ResultSet rs = stmt.executeQuery("SELECT p.id, p.id_comisie, (select count(*) from studenti s where s.id_prof = p.id) as \"count\" FROM profesori p")) {
            while (rs.next()) {
                int idComisie = -1;
                if (rs.getInt("id_comisie") > 0) idComisie = rs.getInt("id_comisie");
                Profesor profesor = new Profesor(rs.getInt("id"), idComisie, rs.getInt("count"));
                listaProfi.add(profesor);
            }
        }
    }

    /**
     * This method connects to the DataBase and takes all the commission's ids,
     * The professors assigned to that commission, and their role in the commission,
     * Storing everything in listaComisii
     *
     * @throws SQLException if there are problems with the connection to the DataBase
     */
    public void readComisiiLicenta() throws SQLException {
        listaComisii = new ArrayList<>();
        Connection con = DataBase.getConnection();
        try (Statement stmt = con.createStatement();
             ResultSet rs = stmt.executeQuery("select c.id, p.id as \"idProf\", p.rol from comisii left outer join profesori p on p.id_comisie=c.id")) {
            int id=0;
            ComisieLicenta comisie = null;
            while (rs.next()) {
                if(id != rs.getInt("id") || comisie == null) {
                    comisie = new ComisieLicenta(rs.getInt("id"));
                    listaComisii.add(comisie);
                }
                if(rs.getString("rol").equals("Presedinte")){
                    comisie.setNextProf(rs.getInt("idProf"));
                } else if (rs.getString("rol").equals("Secretar"))
                    comisie.setNextSecretar(rs.getInt("idProf"));
                else comisie.setNextProf(rs.getInt("idProf"));
            }
        }
    }

    /**
     * This method takes the list of students as argument and updates the DataBase
     * Adding the commission where they are assigned
     *
     * @param listaStudent the list of students
     * @throws SQLException if there are problems with the connection to the DataBase
     */
    public void update(ArrayList<Student> listaStudent) throws SQLException {
        Connection con = DataBase.getConnection();
        try (Statement stmt = con.createStatement()) {
            ResultSet rs = null;
            for (Student student : listaStudent) {
                rs = stmt.executeQuery("UPDATE studenti SET id_comisie = " + student.getIdComisie() + " WHERE id = " + student.getId());
            }
            if (rs != null)
                rs.close();
        }
    }

    /**
     * Gets the list of the professors
     * @return the list of the professors
     */
    public ArrayList<Profesor> getListaProfi() {
        return listaProfi;
    }

    /**
     * Gets the list of the students
     * @return the list of the students
     */
    public ArrayList<Student> getListaStudent() {
        return listaStudent;
    }

    /**
     * Gets the list of the commissions
     * @return the list of the commissions
     */
    public ArrayList<Comisie> getListaComisii() {
        return listaComisii;
    }
}
