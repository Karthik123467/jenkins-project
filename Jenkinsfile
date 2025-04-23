pipeline {
    agent any

    environment {
        IMAGE_NAME = "pavankumar9030/php-demo"
    }

    stages {
        stage('Clone Repository') {
            steps {
                git 'https://github.com/Karthik123467/php-docker-stack-demo.git'
            }
        }

        stage('Build Docker Image') {
            steps {
                script {
                    sh "docker build -t ${IMAGE_NAME} ."
                }
            }
        }

        stage('Push Docker Image') {
            steps {
                withCredentials([usernamePassword(credentialsId: 'docker-hub-creds', usernameVariable: 'DOCKER_USERNAME', passwordVariable: 'DOCKER_PASSWORD')]) {
                    sh '''
                        echo "$DOCKER_PASSWORD" | docker login -u "$DOCKER_USERNAME" --password-stdin
                        docker push ${IMAGE_NAME}
                    '''
                }
            }
        }
    }

    post {
        always {
            echo 'Pipeline finished.'
        }
        cleanup {
            sh 'docker logout'
        }
    }
}
