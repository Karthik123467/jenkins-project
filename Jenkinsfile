pipeline {
    agent any

    environment {
        // Define the path to your docker-compose.yml file (adjust if necessary)
        COMPOSE_FILE = 'docker-compose.yml'
    }

    stages {
        stage('Clone Repository') {
            steps {
                // Clone your GitHub repository
                git 'https://github.com/Karthik123467/php-docker-stack-demo'
            }
        }
        
        stage('Build Docker Images') {
            steps {
                script {
                    // Use Windows commands for Docker
                    bat 'docker-compose -f %COMPOSE_FILE% down'  // Stop containers if already running
                    bat 'docker-compose -f %COMPOSE_FILE% up -d'  // Start containers in detached mode
                }
            }
        }

        stage('Verify Containers') {
            steps {
                script {
                    // Ensure the containers are up and running
                    bat 'docker ps'
                }
            }
        }

        stage('Cleanup') {
            steps {
                // Optionally, you can clean up the containers if needed after verification
                bat 'docker-compose -f %COMPOSE_FILE% down'
            }
        }
    }

    post {
        success {
            echo 'Deployment was successful!'
        }
        failure {
            echo 'Deployment failed.'
        }
    }
}












     

