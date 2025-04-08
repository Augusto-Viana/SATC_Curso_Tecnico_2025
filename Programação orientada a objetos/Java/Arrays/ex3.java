package Arrays;

//Considere o problema de registrar 10 valores inteiros (positivos e negativos). Cada valor é armazenado em uma variável interna a uma estrutura array chamada números. Após cadastro, verificar e mostrar a quantidade de números positivos e negativos digitados.

import java.util.Scanner;

public class ex3 {
    public static void main(String [] args) {
        int positive = 0, negative = 0;
        int[] numbers = new int [10];

        Scanner scanner = new Scanner(System.in);

        for(int i = 0; i < 10; i++) {
            
            System.out.print("Digite um número: ");
            numbers[i] = scanner.nextInt();

            if(numbers[i] >= 0) {
                positive++;
            }
            if(numbers[i] < 0) {
                negative++;
            }
        }

        for(int i = 0; i < 10; i++) {
            System.out.println("Números: " + numbers[i]);
        }
        System.out.println("Números positivos: " + positive);
        System.out.println("Números negativos: " + negative);

        scanner.close();
    }
}