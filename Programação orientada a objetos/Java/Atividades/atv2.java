package Atividades;
//Faça um programa que receba o preço de três produtos e informe qual produto você deve comprar, sabendo que a decisão é sempre pelo mais barato.

import java.util.Scanner;

public class atv2 {
    public static void main(String[] args) {
        Scanner entrada = new Scanner(System.in);
        double produto1, produto2, produto3;
        
        System.out.print("Economizador de din din\n\n");

        System.out.print("Insira o preço de um produto: ");
        produto1 = entrada.nextDouble();

        System.out.print("Insira o preço de outro produto: ");
        produto2 = entrada.nextDouble();

        System.out.print("Insira o preço de um último produto: ");
        produto3 = entrada.nextDouble();
            
        if (produto1 < produto2 && produto1 < produto3) {
            System.out.print("O produto mais barato é: " + produto1);
        }
        else if (produto2 < produto1 && produto2 < produto3) {
            System.out.print("O produto mais barato é: " + produto2);
        }
        else if (produto3 < produto1 && produto3 < produto2) {
            System.out.print("O produto mais barato é: " + produto3);
        }
        else {
            System.out.print("Todos os produtos possuem o mesmo preço!");
        }
        entrada.close();
    }
}