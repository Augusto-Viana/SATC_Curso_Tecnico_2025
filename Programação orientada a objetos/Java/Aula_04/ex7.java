package Aula_04;

import java.util.Scanner;

import javax.swing.JOptionPane;

public class ex7 {

    public static void main(String[] args) {
        Setor();
        System.exit(0);
    }

    public static void Setor() {
        Scanner entrada = new Scanner(System.in);

        int a = 0; //Almoxarifado
        int p = 0; //Produção
        int c = 0; //Contabilidade
        int v = 0; //Vendas
        double salarioFinal = 0;

        for (int i = 1; i <= 50; i++) {
            System.out.println("Cadastro de funcionários");

            String cargo = JOptionPane.showInputDialog("Digite a sigla do cargo\nA - Almoxarifado\nP - Produção\nC - Contabilidade\nV - Vendas".toUpperCase());

            System.out.print("Digite o valor do salário: ");
            Double salario = entrada.nextDouble();

            if (cargo.equalsIgnoreCase("A")) {
                a++;
            } else if (cargo.equalsIgnoreCase("P")) {
                p++;
            } else if (cargo.equalsIgnoreCase("C")) {
                c++;
            } else if (cargo.equalsIgnoreCase("V")) {
                v++; 
            } else {
                System.out.println("Esse cargo não existe! Tente novamente.");
            }
            salarioFinal = salarioFinal + salario;
        }

        System.out.println("Lista dos funcionários nos cargos:");
        System.out.println("A: " + a);
        System.out.println("P: " + p);
        System.out.println("C: " + c);
        System.out.println("V: " + v);

        System.out.println("Total dos salários: ");
        System.out.println("R$ " + salarioFinal);

        entrada.close();
    }
}