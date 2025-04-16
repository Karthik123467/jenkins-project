pipeline {
    agent any

    environment {
        COMPOSE_PROJECT_NAME = 'php_project'
    }

    stages {
        stage('Clone Repo') {
            steps {
                git 'https://github.com/Karthik123467/jenkins-project.git'
            }
        }

        stage('Rebuild Docker') {
            steps {
                sh 'docker-compose down'
                sh 'docker-compose up -d --build'
            }
        }
    }

    post {
        success {
            echo 'Deployment successful. Access it at http://localhost:8081'
        }
        failure {
            echo 'Deployment failed.'
        }
    }
}
