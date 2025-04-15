pipeline {
    agent any

    environment {
        COMPOSE_PROJECT_NAME = "php_docker_project"
    }

    stages {
        stage('Checkout') {
            steps {
                git 'https://github.com/Karthik123467/jenkins-project.git'
            }
        }

        stage('Stop Existing Containers') {
            steps {
                script {
                    sh 'docker-compose down || true'
                }
            }
        }

        stage('Build and Run') {
            steps {
                sh 'docker-compose up -d --build'
            }
        }
    }

    post {
        success {
            echo 'Deployment completed successfully!'
        }
        failure {
            echo 'Deployment failed.'
        }
    }
}
