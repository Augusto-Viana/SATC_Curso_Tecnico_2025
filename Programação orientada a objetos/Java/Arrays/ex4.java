package Arrays;

//Considere o problema de registrar 10 valores inteiros. Cada valor é armazenado em uma variável interna a uma estrutura array chamada valores. Após cadastro, verificar e mostrar a quantidade de números pares e ímpares digitados.

import java.util.Scanner;

public class ex4 {
    public static void main(String [] args) {
        int pairs = 0, odds = 0;
        int[] values = new int [10];

        Scanner scanner = new Scanner(System.in);

        for(int i = 0; i < 10; i++) {
            
            System.out.print("Digite um número: ");
            values[i] = scanner.nextInt();

            if(values[i] % 2 == 0) {
                pairs++;
            }
            if(values[i] % 2 != 0) {
                odds++;
            }
        }

        for(int i = 0; i < 10; i++) {
            System.out.println("Números: " + values[i]);
        }
        System.out.println("Números pares: " + pairs);
        System.out.println("Números ímpares: " + odds);

        scanner.close();
    }
}
