pipeline {
    agent any

    environment {
        COMPOSE_CMD = 'docker-compose'
    }

    stages {
        stage('Clone Repo') {
            steps {
                // Jenkins clones automatically, but keeping it explicit
                git 'https://github.com/Karthik123467/jenkins-project.git'
            }
        }

        stage('Stop Existing Containers') {
            steps {
                script {
                    bat "${env.COMPOSE_CMD} down"
                }
            }
        }

        stage('Build and Run Docker') {
            steps {
                script {
                    bat "${env.COMPOSE_CMD} up -d --build"
                }
            }
        }
    }

    post {
        always {
            echo 'Pipeline finished.'
        }
    }
}
