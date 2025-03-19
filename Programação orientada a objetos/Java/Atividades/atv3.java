package Atividades;
//Faça um programa que receba duas notas parciais de um aluno. O programa deve calcular a média alcançada por aluno e apresentar:
//A mensagem "Aprovado", se a média alcançada for maior ou igual a sete;
//A mensagem "Reprovado", se a média for menor do que sete;
//A mensagem "Aprovado com Distinção", se a média for igual a dez.


import java.util.Scanner;

public class atv3 {
    public static void main(String[] args) {
        Scanner entrada = new Scanner(System.in);
        double nota1, nota2, media;
        
        System.out.print("Cálculo de média\n\n");

        System.out.print("Insira a primeira nota: ");
        nota1 = entrada.nextDouble();

        System.out.print("Insira a segunda nota: ");
        nota2 = entrada.nextDouble();
        
        media = (nota1 + nota2) / 2;

        if (media >= 7 && media < 10) {
            System.out.print("O aluno foi aprovado! Sua média foi: " + media);
        }
        else if (media < 7) {
            System.out.print("O aluno foi reprovado! Sua média foi: " + media);
        }
        else if (media == 10) {
            System.out.print("O aluno foi aprovado com distinção pois sua média foi 10! B)");
        }
        else {
            System.out.print("Algo deu errado!");
        }

        entrada.close();
    }
}
