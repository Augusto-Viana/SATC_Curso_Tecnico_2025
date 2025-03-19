package Aula_03;
//Escrever um algoritmo para cadastrar dados de 50 alunos de uma Escola: nome do aluno e a sigla do curso e verificar o total alunos em cada curso:
	//Sigla			Curso
	//INF		    Informática
	//MEC			Mecatrônica
	//ELE			Eletrônica
	//DES			Design

import java.util.Scanner;
import javax.swing.JOptionPane;

public class ex2 {
    public static void main(String[] args) {
        Scanner entrada = new Scanner(System.in);
        
        int inf = 0;
        int mec = 0;
        int ele = 0;
        int des = 0;

        for (int i = 1; i <= 50; i++) {
            System.out.println("Cadastro de curso");

            String curso = JOptionPane.showInputDialog("Digite a sigla do curso\nINF - Informática\nMEC - Mecatrônica\nELE - Eletrônica\nDES - Design\n: ".toUpperCase());

            if (curso.equalsIgnoreCase("INF")) {
               inf++;
            } else if (curso.equalsIgnoreCase("MEC")) {
                mec++;
            } else if (curso.equalsIgnoreCase("ELE")) {
                ele++;
            } else if (curso.equalsIgnoreCase("DES")) {
                des++;
            } else {
                System.out.println("Este curso não existe! Tente novamente.");
            }
        }
        System.out.println("Lista dos alunos nos cursos:");
        System.out.println("INF: " + inf);
        System.out.println("MEC: " + mec);
        System.out.println("ELE: " + ele);
        System.out.println("DES: " + des);
        entrada.close();
    }
}