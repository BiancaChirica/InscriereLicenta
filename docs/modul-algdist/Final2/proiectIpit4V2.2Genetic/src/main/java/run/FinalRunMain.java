package run;

import Algoritmi.Genetic;
import Algoritmi.Greedy;
import DatabaseConnection.Controller;

public class FinalRunMain {
    public static void main(String[] args) {
        Controller controller = new Controller();
        try {
            controller.readLicenta();
        }
        catch (Exception e) {System.out.println(e.getMessage());}

        new Genetic(controller.getListaStudenti(), controller.getListaProfi(), controller.getListaComisii()).startAlg();
        //new Greedy(controller.getListaStudenti(), controller.getListaProfi(), controller.getListaComisii()).startSmart();

        try {
            controller.update();
        }
        catch (Exception e) {System.out.println(e.getMessage());}

        controller = new Controller();
        try {
            controller.readDisertatie();
        }
        catch (Exception e) {System.out.println(e.getMessage());}

        new Genetic(controller.getListaStudenti(), controller.getListaProfi(), controller.getListaComisii()).startAlg();
        //new Greedy(controller.getListaStudenti(), controller.getListaProfi(), controller.getListaComisii()).startSmart();

        try {
            controller.update();
        }
        catch (Exception e) {System.out.println(e.getMessage());}

    }
}
