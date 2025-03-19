package Aula_04;

import java.util.Scanner;

public class ex2 {
    public static void main(String[] args) {
        Idade();
        System.exit(0);
    }

    public static void Idade() {
        Scanner scanner = new Scanner(System.in);

        System.out.println("Informe o valor de quantos atletas serão verificados: ");
        int nunAtletas = scanner.nextInt();
        scanner.nextLine(); 

        int infantil = 0;
        int juvenil = 0;
        int profissional = 0;
        int veterano = 0;

        while (nunAtletas > 0) {
            System.out.println("Informe seu nome: ");
            String nome = scanner.nextLine();

            System.out.println("Informe a sua idade: ");
            int idade = scanner.nextInt();
            scanner.nextLine();

            if (idade >= 0 && idade <= 13) {
                System.out.println("O atleta " + nome + " é da categoria infantil.");
                infantil++; 
            } else if (idade >= 14 && idade <= 17) {
                System.out.println("O atleta " + nome + " é da categoria juvenil.");
                juvenil++;
            } else if (idade >= 18 && idade <= 40) {
                System.out.println("O atleta " + nome + " é da categoria profissional.");
                profissional++;
            } else if (idade > 40) {
                System.out.println("O atleta " + nome + " é da categoria veterano.");
                veterano++;
            }
            nunAtletas--;
        }
        System.out.println("Temos " + infantil + " atletas da categoria infantil.");
        System.out.println("Temos " + juvenil + " atletas da categoria juvenil.");
        System.out.println("Temos " + profissional + " atletas da categoria profissional.");
        System.out.println("Temos " + veterano + " atletas da categoria veterano.");

        scanner.close();
    }
}
