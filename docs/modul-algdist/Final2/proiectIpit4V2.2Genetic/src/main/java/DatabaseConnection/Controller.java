package DatabaseConnection;

import DateBd.*;

import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;

/**
 * This class is used to communicate with the DataBase
 * By reading and updating data
 */
public class Controller {



    /**
     * The list of the students
     */
    private ArrayList<Student> listaStudenti;

    /**
     * The list of the professors
     */
    private ArrayList<Profesor> listaProfi;

    /**
     * The list of the commissions
     */
    private ArrayList<Comisie> listaComisii;

    public Controller() {}

    public void readLicenta() throws SQLException {
        readStudentlicenta();
        readProfiLicenta();
        readComisiiLicenta();
    }

    public void readDisertatie() throws SQLException {
        readStudentDisertatie();
        readProfiDisertatie();
        readComisiiDisertatie();
    }

    /**
     * This method connects to the DataBase and takes all the student's ids
     * With the professor of where they are assigned,
     * Storing everything in listaStudent
     * @throws SQLException if there are problems with the connection to the DataBase
     */
    public void readStudentlicenta() throws SQLException {
        listaStudenti = new ArrayList<>();
        Connection con = DataBase.getConnection();
        try (Statement stmt = con.createStatement();
             ResultSet rs = stmt.executeQuery("select distinct id,id_prof, sesiune from studenti where studenti.sesiune = 1")) {
            while (rs.next()) {
                Student student = new Student(rs.getInt("id"), rs.getInt("id_prof"));
                listaStudenti.add(student);
            }
        }
    }

    public void readStudentDisertatie() throws SQLException {
        listaStudenti = new ArrayList<>();
        Connection con = DataBase.getConnection();
        try (Statement stmt = con.createStatement();
             ResultSet rs = stmt.executeQuery("select distinct id,id_prof, sesiune from studenti where studenti.sesiune = 2")) {
            while (rs.next()) {
                Student student = new Student(rs.getInt("id"), rs.getInt("id_prof"));
                listaStudenti.add(student);
            }
        }
    }

    /**
     * This method connects to the DataBase and takes all the professor's ids,
     * The commission id of where they are assigned, and the number of students
     * That are assigned to them, storing everything in listaProfi
     * @throws SQLException if there are problems with the connection to the DataBase
     */
    public void readProfiLicenta() throws SQLException {
        listaProfi = new ArrayList<>();
        Connection con = DataBase.getConnection();
        try (Statement stmt = con.createStatement();
            ResultSet rs = stmt.executeQuery("SELECT distinct p.id, p.id_comisie, (select count(*) from studenti s where s.id_prof = p.id and s.sesiune = 1) as \"count\" FROM profesori p")) {
            while (rs.next()) {
                int idComisie = -1;
                if (rs.getInt("id_comisie") > 0) idComisie = rs.getInt("id_comisie");
                Profesor profesor = new Profesor(rs.getInt("id"), idComisie, rs.getInt("count"));
                listaProfi.add(profesor);
            }
        }
    }

    public void readProfiDisertatie() throws SQLException {
        listaProfi = new ArrayList<>();
        Connection con = DataBase.getConnection();
        try (Statement stmt = con.createStatement();
             ResultSet rs = stmt.executeQuery("SELECT distinct p.id, p.id_comisie, (select count(*) from studenti s where s.id_prof = p.id and s.sesiune = 2) as \"count\" FROM profesori p")) {
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
            ResultSet rs = stmt.executeQuery(
                     "select c.id, p.id as \"idProf\", lower(p.rol) as rol from comisii c left outer join profesori p on p.id_comisie=c.id where c.sesiune = 1")) {
            int nrProfi = 1;
            Comisie comisie = null;
            while (rs.next()) {
                if(nrProfi == 1) {
                    comisie = new ComisieLicenta(rs.getInt("id"));
                    listaComisii.add(comisie);
                }
                if(rs.getString("rol").equals("presedinte")){
                    comisie.setNextProf(rs.getInt("idProf"));
                }
                else if (!(rs.getString("rol").equals("secretar")))
                    comisie.setNextProf(rs.getInt("idProf"));
                nrProfi++;
                if (nrProfi == 5) nrProfi = 1;
            }
        }
    }

    public void readComisiiDisertatie() throws SQLException {
        listaComisii = new ArrayList<>();
        Connection con = DataBase.getConnection();
        try (Statement stmt = con.createStatement();
             ResultSet rs = stmt.executeQuery(
                     "select distinct c.id, p.id as \"idProf\", lower(p.rol) as rol from comisii c left outer join profesori p on p.id_comisie=c.id where c.sesiune = 2")) {
            int nrProfi = 1;
            Comisie comisie = null;
            while (rs.next()) {
                if(nrProfi == 1) {
                    comisie = new ComisieDisertatie(rs.getInt("id"));
                    listaComisii.add(comisie);
                }
                if(rs.getString("rol").equals("presedinte")){
                    comisie.setNextProf(rs.getInt("idProf"));
                }
                else if (!(rs.getString("rol").equals("secretar")))
                    comisie.setNextProf(rs.getInt("idProf"));
                nrProfi++;
                if (nrProfi == 6) nrProfi = 1;
            }
        }
    }

    /**
     * This method takes the list of students as argument and updates the DataBase
     * Adding the commission where they are assigned
     *
     * @throws SQLException if there are problems with the connection to the DataBase
     */
    public void update() throws SQLException {
        Connection con = DataBase.getConnection();
        try (Statement stmt = con.createStatement()) {
            ResultSet rs = null;
            for (Student student : this.listaStudenti) {
                stmt.executeUpdate("UPDATE studenti SET id_comisie = " + student.getIdComisie() + " WHERE id = " + student.getId());
            }
            DataBase.commit();
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
    public ArrayList<Student> getListaStudenti() {
        return listaStudenti;
    }

    /**
     * Gets the list of the commissions
     * @return the list of the commissions
     */
    public ArrayList<Comisie> getListaComisii() {
        return listaComisii;
    }
}
