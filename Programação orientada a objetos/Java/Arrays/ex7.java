package Arrays;

//Considere o problema de registrar 10 valores string (correspondente ao nome de pessoas). Cada valor é armazenado em uma variável interna a uma estrutura array chamada pessoas. Após cadastro, verificar e mostrar se o nome de uma pessoa informada pelo usuário se encontra ou não na array cadastrada.

import java.util.Scanner;

public class ex7 {
    public static void main(String[] args) {
        String[] people = new String[10];
        Scanner scanner = new Scanner(System.in);

        boolean finder = false;

        System.out.println("Por favor, digite o nome de 10 pessoas:");
        for (int i = 0; i < 10; i++) {
            System.out.print("Nome " + (i + 1) + ": ");
            people[i] = scanner.nextLine();
        }

        System.out.print("Digite o nome para a pesquisa caso o mesmo já tenha sido cadastrado: ");
        String verify = scanner.nextLine();

        for (int i = 0; i < 10; i++) {
            if (people[i].equalsIgnoreCase(verify)) {
            	finder = true;
                break;
            }
        }

        if (finder == true) {
            System.out.println("O nome " + verify + " já foi cadastrado.");
        } else {
            System.out.println("O nome " + verify + " não foi cadastrado ainda.");
        }

        scanner.close();
    }
}