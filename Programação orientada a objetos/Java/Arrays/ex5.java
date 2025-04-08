package Arrays;

import java.util.Scanner;

//Construir um programa JAVA que contenha um método que recebe como parâmetro um array de números inteiros e retorna o  maior número existente no array.

public class ex5 {
    public static void main(String[] args) {
        Number();
        System.exit(0);
}

    public static void Number() {
        int bigger = 0, smaller = 99;
        int[] numbers = new int [10];

        Scanner scanner = new Scanner(System.in);

        for(int i = 0; i < 10; i++) {
            
            System.out.print("Digite um número: ");
            numbers[i] = scanner.nextInt();

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

        scanner.close();
    }
}