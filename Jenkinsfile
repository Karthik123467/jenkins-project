pipeline {
    agent any

    environment {
        COMPOSE_PROJECT_NAME = "php_project"
    }

    stages {
        stage('Clone Repository') {
            steps {
                git 'https://github.com/Karthik123467/jenkins-project.git'
            }
        }

        stage('Stop Old Containers') {
            steps {
                sh 'docker-compose down || true'
            }
        }

        stage('Build and Run Docker Containers') {
            steps {
                sh 'docker-compose up -d --build'
            }
        }

        stage('Confirm Running Containers') {
            steps {
                sh 'docker ps'
            }
        }
    }
}



