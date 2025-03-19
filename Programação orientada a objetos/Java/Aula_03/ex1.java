package Aula_03;
//Escrever um programa que leia nome, disciplina e duas notas dos 30 alunos de um curso. Após calcular a média final e verificar sua situação: 
	//Alunos Reprovados (média < 5)
    //Alunos em Recuperação (média >= 5 e média < 7)
    //Alunos Aprovados (média >= 7)
 

import java.util.Scanner;
import javax.swing.JOptionPane;

public class ex1 {
    public static void main(String[] args) {
        Scanner entrada = new Scanner(System.in);
        for (int i = 1; i <= 30; i++) {
            System.out.println("Cálculo de notas");

            String nome = JOptionPane.showInputDialog("Digite o nome do aluno: ");
            String disciplina = JOptionPane.showInputDialog("Digite o nome da disciplina: ");
            
            System.out.print("Digite a primeira nota: ");
            Double nota1 = entrada.nextDouble();
            System.out.print("Digite a segunda nota: ");
            Double nota2 = entrada.nextDouble();

            Double media = (nota1 + nota2) / 2;

            if (media >= 7) {
                System.out.println("O aluno " + nome + " na disciplina " + disciplina + " está aprovado! A média foi de " + media);
            } else if (media >= 5 && media < 7) {
                System.out.println("O aluno " + nome + " na disciplina " + disciplina + " está em recuperação! A média foi de " + media);
            } else if (media < 5) {
                System.out.println("O aluno " + nome + " na disciplina " + disciplina + " está reprovado! A média foi de " + media);
            } else {
                System.out.println("Algo deu errado! Tente novamente.");
            }
        }
        entrada.close();
    }
}