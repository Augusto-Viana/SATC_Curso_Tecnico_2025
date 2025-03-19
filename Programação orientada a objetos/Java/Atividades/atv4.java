package Atividades;
//Faça um Programa que receba um número e exiba o dia correspondente da semana. (1-Domingo, 2- Segunda, etc.), se digitar outro valor deve aparecer a mensagem “valor inválido”.


import java.util.Scanner;

public class atv4 {
    public static void main(String[] args) {
        Scanner entrada = new Scanner(System.in);
        double dia;
        
        System.out.print("Escolha um número entre 1 e 7 e receba um dia da semana!\n\n");

        System.out.print("Insira um valor entre 1 e 7: ");
        dia = entrada.nextDouble();
            
        if (dia == 1) {
            System.out.print("Domingo");
        }
        else if (dia == 2) {
            System.out.print("Segunda-Feira!");
        }
        else if (dia == 3) {
            System.out.print("Terça-Feira!");
        }
        else if (dia == 4) {
            System.out.print("Quarta-Feira!");
        }
        else if (dia == 5) {
            System.out.print("Quinta-Feira!");
        }
        else if (dia == 6) {
            System.out.print("Sexta-Feira!");
        }
        else if (dia == 7) {
            System.out.print("Sábado!");
        }
        else if (dia > 7 || dia < 0) {
            System.out.print("Algo deu errado! Tente novamente.");
        }
        entrada.close();
    }
}
