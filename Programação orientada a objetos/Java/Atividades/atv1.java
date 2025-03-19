package Atividades;
//Faça um programa que receba dois números e imprima o maior deles.

import java.util.Scanner;

public class atv1 {
    public static void main(String[] args) {
        Scanner entrada = new Scanner(System.in);
        double num1, num2;
        
        System.out.print("Comparador de números\n\n");

        System.out.print("Digite um número: ");
        num1 = entrada.nextDouble();

        System.out.print("Digite outro número: ");
        num2 = entrada.nextDouble();

        if (num1 > num2) {
            System.out.print(num1 + " é maior que " + num2 + ".");
        }
        else {
            System.out.print(num2 + " é maior que " + num1 + ".");
        }
        entrada.close();
    }
}