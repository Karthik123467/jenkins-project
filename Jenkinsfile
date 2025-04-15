pipeline {
    agent any

    stages {
        stage('Clone Repository') {
            steps {
                deleteDir() // Clean workspace
                git 'https://github.com/Karthik123467/jenkins-project.git'
            }
        }

        stage('Restart Docker Containers') {
            steps {
                sh '''
                    docker-compose down
                    docker-compose up -d
                '''
            }
        }

        stage('List Running Containers') {
            steps {
                sh 'docker ps'
            }
        }
    }
}
