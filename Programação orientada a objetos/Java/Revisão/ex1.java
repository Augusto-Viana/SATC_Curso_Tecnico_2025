package Revisão;

//Uma indústria deseja controlar seus funcionários. Construa um programa JAVA que considere o problema de registrar os nomes dos funcionários, seus respectivos cargos e salários em Arrays (separadas). Após a leitura, imprima os funcionários, cargos e salários cadastrados.

import java.util.Scanner;

public class ex1 {
    public static void main(String[] args) {
        String[] names = new String[2];
        String[] posts = new String[2];
        Double[] salarys = new Double[2];

        int position = 1;
        int position2 = 1;

        Scanner scanner = new Scanner(System.in);

        for(int i = 0; i < 2; i++) {
            System.out.print("Digite o nome do funcionário " + position + ": ");
            names[i] = scanner.nextLine();

            System.out.print("Digite o cargo do funcionário " + position + ": ");
            posts[i] = scanner.nextLine();

            System.out.print("Digite o salário do funcionário " + position + ": ");
            salarys[i] = scanner.nextDouble();

            position++;
            scanner.nextLine();
        }

        for(int i = 0; i < 2; i++) {
            System.out.println("Funcionário " + position2 + " com o nome de " + names[i] + ", com o cargo de " + posts[i] + ", com o salário de R$ " + salarys[i] + ".");
            position2++;
        }

        scanner.close();
    }
}