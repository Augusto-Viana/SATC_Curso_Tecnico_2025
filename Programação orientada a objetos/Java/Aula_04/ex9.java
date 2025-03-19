package Aula_04;

import java.util.Scanner;

public class ex9 {

    public static void main(String[] args) {
        Idade();
        System.exit(0);
    }

    public static void Idade() {
               Scanner entrada = new Scanner(System.in);
        
        int maior18 = 0;
        int menor18 = 0;
        int mas = 0;
        int fem = 0;

        System.out.println("Cadastro da Universidade do Jegue");

        for (int i = 1; i <= 2; i++) {
            //System.out.println("Digite o nome do aluno: ");
            //String nome = entrada.nextLine();

            System.out.println("Digite a idade do aluno: ");
            int idade = entrada.nextInt();

            System.out.println("Digite o sexo do aluno\nM - Masculino\nF - Feminino\n");
            String sexo = entrada.nextLine().toUpperCase();

            if (idade < 18 && idade > 0) {
                menor18++;
            } else if (idade >= 18 && idade <= 100) {
                maior18++;
            } else {
                System.out.println("Essa idade ta meio errada, não acha não?");
            }

            if (sexo.equalsIgnoreCase("M")) {
                mas++;
            } else if (sexo.equalsIgnoreCase("F")) {
                fem++;
            } else {
                System.out.println("Algo deu errado, tente novamente.");
            }        
        }
        System.out.println("Lista das idades dos alunos:");
        System.out.println("Alunos maiores de ou com 18 anos: " + maior18);
        System.out.println("Alunos menores de 18 anos: " + menor18);

        System.out.println("Lista dos sexos dos alunos:");
        System.out.println("Alunos masculinos: " + mas);
        System.out.println("Alunos femininos: " + fem);
        entrada.close();
    }    
}
