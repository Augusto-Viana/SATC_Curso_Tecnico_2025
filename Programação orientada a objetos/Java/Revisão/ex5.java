package Revisão;

//Construir um programa JAVA que contenha um método que recebe como parâmetro um array de 10 números inteiros e mostre somente os valores negativos digitados.

import java.util.Scanner;

public class ex5 {
    public static void main(String[] args) {
        int[] numbers = new int [10];

        Scanner scanner = new Scanner(System.in);

        for(int i = 0; i < 10; i++) {
            System.out.print("Digite um número: ");
            numbers[i] = scanner.nextInt();
        }

        Negatives(numbers);

        scanner.close();
    }

    public static void Negatives(int[] numbers) {
        for(int i = 0; i < 3; i++) {
            if(numbers[i] < 0) {
                System.out.println("Número negativo encontrado: " + numbers[i]);
            }
        }
    }
}