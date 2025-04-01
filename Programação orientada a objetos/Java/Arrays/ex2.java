package Arrays;

//Considere uma aplicação que solicite uma sequência de números inteiros positivos para o usuário, e informe o maior e o menor deles. A sequência não pode conter mais do que 10 números. Internamente, a aplicação deverá armazenar os números fornecidos pelo usuário em um array apontado pela variável numeros. Somente depois que o usuário fornecer todos os valores, a aplicação deverá determinar os resultados e apresentá-los para o usuário.

import java.util.Scanner;

public class ex2 {
    public static void main(String [] args) {
        int bigger = 0, smaller = 99;
        int[] numbers = new int [10];

        Scanner entrada = new Scanner(System.in);

        for(int i = 0; i < 10; i++) {
            
            System.out.print("Digite um número: ");
            numbers[i] = entrada.nextInt();

            if(numbers[i] > bigger) {
                bigger = numbers[i];
            }
            if(numbers[i] < smaller) {
                smaller = numbers[i];
            }
        }

        for(int i = 0; i < 10; i++) {
            System.out.println("Números: " + numbers[i]);
        }
        System.out.println("Maior valor do array: " + bigger);
        System.out.println("Menor valor do array: " + smaller);

        entrada.close();
    }
}