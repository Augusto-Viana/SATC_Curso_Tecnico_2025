package Revisão;

//Uma clínica deseja controlar seus médicos. Construa um programa JAVA que considere o problema de registrar os nomes dos médicos e o nomes das suas especialidades em Arrays (separadas). Após a leitura, imprimir os médicos e especialidades cadastradas.

import java.util.Scanner;

public class ex2 {
        public static void main(String[] args) {
        String[] names = new String[2];
        String[] specialtys = new String[2];

        int position = 1;
        int position2 = 1;

        Scanner scanner = new Scanner(System.in);

        for(int i = 0; i < 2; i++) {
            System.out.print("Digite o nome do médico " + position + ": ");
            names[i] = scanner.nextLine();

            System.out.print("Digite a especialidade do médico do médico " + position + ": ");
            specialtys[i] = scanner.nextLine();

            position++;
            scanner.nextLine();
        }

        for(int i = 0; i < 2; i++) {
            System.out.println("Médico " + position2 + ", com o nome de " + names + ", com a especialidade " + specialtys + ".");
            position2++;
        }
        
        scanner.close();
    }
}
