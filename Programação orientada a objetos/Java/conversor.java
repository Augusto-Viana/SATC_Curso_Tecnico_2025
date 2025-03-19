import java.util.Scanner;

class Main {
    public static void main(String[] args) {
        Scanner entrada = new Scanner(System.in);
        double celsius, fahrenheit;

        System.out.print("Conversor de temperatura: Graus Celsius -> Fahrenheit\n\n");

        System.out.print("Digite a temperatura em Celsius: ");
        celsius = entrada.nextDouble();

        fahrenheit = (9 * celsius + 160) / 5;

        System.out.println("\n A medida convertida tem o valor de: " + fahrenheit + "ºF");
        entrada.close();
    }
}