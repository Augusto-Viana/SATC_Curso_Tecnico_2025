package Revisão;

//Construir um programa JAVA que contenha um método que recebe como parâmetro um array de 10 números inteiros e mostre somente os valores ímpares digitados.

import java.util.Scanner;

public class ex4 {
       public static void main(String[] args) {
        int[] values = new int [3];

        Scanner scanner = new Scanner(System.in);

        for(int i = 0; i < 3; i++) {
            System.out.print("Digite um número: ");
            values[i] = scanner.nextInt();
        }

        Odds(values);

        scanner.close();
    }

    public static void Odds(int[] values) {
        for(int i = 0; i < 3; i++) {
            if(values[i] % 2 != 0) {
                System.out.println("Ímpar encontrado: " + values[i]);
            }
        }
    }
}